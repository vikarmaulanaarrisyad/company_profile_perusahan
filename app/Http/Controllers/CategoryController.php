<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }

    public function data(Request $request)
    {
        $category = Category::orderBy('id', 'DESC');

        return datatables($category)
            ->addIndexColumn()
            ->addColumn('aksi', function ($category) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('category.show', $category->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('category.destroy', $category->id) . '`,`' . $category->category_name . '`)"><i class="fas fa-trash"></i></button>
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
            'category_name' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Gagal menyimpan data, silahkan periksa kembali.'], 422);
        }

        $data = [
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name)
        ];

        Category::create($data);

        return response()->json(['message' => 'Kategori berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json(['data' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'category_name' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Gagal menyimpan data, silahkan periksa kembali.'], 422);
        }

        $data = [
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name)
        ];

        $category->update($data);

        return response()->json(['message' => 'Kategori berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }

    function search(Request $request)
    {
        $keyword = $request->get('q');

        $category = Category::where('category_name', "LIKE", "%$keyword%")->get();

        return $category;
    }
}
