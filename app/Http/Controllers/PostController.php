<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.post.index');
    }

    public function data(Request $request)
    {
        $post = Post::with('user')
            ->when($request->has('status') && $request->status != "", function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->orderBy('id', 'DESC');

        return datatables($post)
            ->addIndexColumn()
            ->editColumn('path_image', function ($post) {
                return '<img src="' . Storage::url($post->path_image) . '" class="img-thumbnail">';
            })
            ->editColumn('status', function ($post) {
                return '<span class="badge badge-' . $post->statusColor() . '">' . $post->status . '</span>';
            })
            ->addColumn('author', function ($post) {
                return $post->user->name;
            })
            ->addColumn('aksi', function ($post) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('post.show', $post->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('post.destroy', $post->id) . '`,`' . $post->post_title . '`)"><i class="fas fa-trash"></i></button>
                ';
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'post_title' => 'required|min:8',
            'categories' => 'required|array',
            'body' => 'required|min:8',
            'status' => 'required|in:publish,archived',
            'path_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];

        $message = [
            'post_title.required' => 'Judul wajib diisi.',
            'post_title.min' => 'Judul berisi minimal 8 karakter.',
            'categories.required' => 'Kategori wajib diisi.',
            'body.required' => 'Judul wajib diisi.',
            'body.min' => 'Body berisi minimal 8 karakter.',
            'path_image.required' => 'Gambar wajib diisi.',
            'path_image.mimes' => 'Gambar yang di upload harus png, jpg, jpeg.',
            'path_image.max' => 'Gambar tidak boleh lebih dari 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = $request->except('path_image', 'categories');
        $data['slug'] = Str::slug($request->post_title);
        $data['path_image'] = upload('post', $request->file('path_image'), 'post');
        $data['user_id'] = auth()->id();

        $post = Post::create($data);

        $post->category_post()->attach($request->categories);

        return response()->json(['message' => 'Postingan berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->categories = $post->category_post;
        $post->path_image = Storage::url($post->path_image);

        return response()->json(['data' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'post_title' => 'required|min:8',
            'categories' => 'required|array',
            'body' => 'required|min:8',
            'status' => 'required|in:publish,archived',
            'path_image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];

        $message = [
            'post_title.required' => 'Judul wajib diisi.',
            'post_title.min' => 'Judul berisi minimal 8 karakter.',
            'categories.required' => 'Kategori wajib diisi.',
            'body.required' => 'Judul wajib diisi.',
            'body.min' => 'Body berisi minimal 8 karakter.',
            'path_image.required' => 'Gambar wajib diisi.',
            'path_image.mimes' => 'Gambar yang di upload harus png, jpg, jpeg.',
            'path_image.max' => 'Gambar tidak boleh lebih dari 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = $request->except('path_image', 'categories');
        $data['slug'] = Str::slug($request->post_title);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('path_image')) {
            if (Storage::disk('public')->exists($post->path_image)) {
                Storage::disk('public')->delete($post->path_image);
            }

            $data['path_image'] = upload('post', $request->file('path_image'), 'post');
        }

        $post->update($data);
        $post->category_post()->sync($request->categories);

        return response()->json(['message' => 'Postingan berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Storage::disk('public')->exists($post->path_image)) {
            Storage::disk('public')->delete($post->path_image);
        }

        $post->delete();

        return response()->json(['data' => null, 'message' => 'Postingan berhasil dihapus']);
    }
}
