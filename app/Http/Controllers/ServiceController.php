<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.index');
    }

    public function data(Request $request)
    {
        $service = Service::when($request->has('status') && $request->status != "", function ($query) use ($request) {
            $query->where('status', $request->status);
        })
            ->orderBy('id', 'DESC');

        return datatables($service)
            ->addIndexColumn()
            ->editColumn('icon', function ($service) {
                // return '<img src="' . Storage::url($service->path_image) . '" class="img-thumbnail">';
                return '<i class="' . $service->icon . '"></i>';
            })
            ->addColumn('aksi', function ($service) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('service.show', $service->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('service.destroy', $service->id) . '`,`' . $service->title . '`)"><i class="fas fa-trash"></i></button>
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
            'title' => 'required|min:8',
            'description' => 'required|min:8',
            'icon' => 'required',
        ];

        $message = [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul berisi minimal 8 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi berisi minimal 8 karakter.',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'icon' => $request->icon,
            'description' => $request->description,
        ];

        Service::create($data);

        return response()->json(['message' => 'Service berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return response()->json(['data' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'title' => 'required|min:8',
            'description' => 'required|min:8',
            'icon' => 'required',
        ];

        $message = [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul berisi minimal 8 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi berisi minimal 8 karakter.',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Silahkan periksa kembali inputan anda'], 422);
        }

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'icon' => $request->icon,
            'description' => $request->description,
        ];

        $service->update($data);

        return response()->json(['message' => 'Service berhasil ditambahkan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => 'Service berhasil dihapus']);
    }
}
