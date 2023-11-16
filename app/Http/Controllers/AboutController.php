<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about.index');
    }

    public function data(Request $request)
    {
        $about = About::all();

        return datatables($about)
            ->addIndexColumn()
            ->addColumn('aksi', function ($about) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('about.show', $about->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        $about->path_image = Storage::url($about->path_image);
        return response()->json(['data' => $about]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }
        $data = $request->except('path_image');
        $data = [
            'title' => $request->title,
            'body' => $request->body,
        ];

        if ($request->hasFile('path_image')) {
            if (Storage::disk('public')->exists($about->path_image)) {
                Storage::disk('public')->delete($about->path_image);
            }

            $data['path_image'] = upload('about', $request->file('path_image'), 'about');
        }

        $about->update($data);

        return response()->json(['message' => 'Berhasil disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
