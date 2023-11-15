<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.galery.index');
    }

    public function data(Request $request)
    {
        $galery = Galery::orderBy('id', 'DESC');

        return datatables($galery)
            ->addIndexColumn()
            ->editColumn('path_image', function ($galery) {
                return '<img src="' . Storage::url($galery->path_image) . '" class="img-thumbnail">';
            })
            ->editColumn('description', function ($galery) {
                return $galery->description;
            })
            ->addColumn('aksi', function ($galery) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('gallery.show', $galery->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('gallery.destroy', $galery->id) . '`,`' . $galery->title . '`)"><i class="fas fa-trash"></i></button>
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
            'title' => 'required',
            'description' => 'required',
            'path_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = $request->except('path_image');

        $data['slug'] = Str::slug($request->title);
        $data['path_image'] = upload('galery', $request->file('path_image'), 'galery');

        Galery::create($data);

        return response()->json(['message' => 'Gambar berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $galery = Galery::findOrfail($id);
        $galery->path_image = Storage::url($galery->path_image);

        return response()->json(['data' => $galery]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $galery = Galery::findOrfail($id);

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'path_image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = $request->except('path_image');
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('path_image')) {
            if (Storage::disk('public')->exists($galery->path_image)) {
                Storage::disk('public')->delete($galery->path_image);
            }

            $data['path_image'] = upload('galery', $request->file('path_image'), 'galery');
        }

        $galery->update($data);

        return response()->json(['message' => 'Gambar berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        if (Storage::disk('public')->exists($galery->path_image)) {
            Storage::disk('public')->delete($galery->path_image);
        }

        $galery->delete();

        return response()->json(['data' => null, 'message' => 'Gambar berhasil dihapus']);
    }
}
