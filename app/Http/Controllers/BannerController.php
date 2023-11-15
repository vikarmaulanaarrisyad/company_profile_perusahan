<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.banner.index');
    }

    public function data(Request $request)
    {
        $banner = Banner::orderBy('id', 'DESC');

        return datatables($banner)
            ->addIndexColumn()
            ->editColumn('icon', function ($banner) {
                return '<img src="' . Storage::url($banner->path_image) . '" class="img-thumbnail">';
            })
            ->addColumn('aksi', function ($banner) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('banner.show', $banner->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('banner.destroy', $banner->id) . '`,`' . $banner->slider_title . '`)"><i class="fas fa-trash"></i></button>
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
            'slider_title' => 'required',
            'description' => 'required',
            'path_image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = $request->except('path_image');

        $data['slug'] = Str::slug($request->slider_title);
        $data['path_image'] = upload('banner', $request->file('path_image'), 'banner');

        Banner::create($data);

        return response()->json(['message' => 'Banner berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        $banner->path_image = Storage::url($banner->path_image);

        return response()->json(['data' => $banner]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $rules = [
            'slider_title' => 'required',
            'description' => 'required',
            'path_image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = $request->except('path_image');
        $data['slug'] = Str::slug($request->slider_title);
        $data['path_image'] = upload('banner', $request->file('path_image'), 'banner');

        if ($request->hasFile('path_image')) {
            if (Storage::disk('public')->exists($banner->path_image)) {
                Storage::disk('public')->delete($banner->path_image);
            }

            $data['path_image'] = upload('banner', $request->file('path_image'), 'banner');
        }

        $banner->update($data);

        return response()->json(['message' => 'Banner berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if (Storage::disk('public')->exists($banner->path_image)) {
            Storage::disk('public')->delete($banner->path_image);
        }

        $banner->delete();

        return response()->json(['data' => null, 'message' => 'Banner berhasil dihapus']);
    }
}
