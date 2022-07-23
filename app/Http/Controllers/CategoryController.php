<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Category::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("category.edit", $data->id).'" class="btn btn-primary mr-3">Edit</a><a href="'.route("hapus.category", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="btn btn-danger">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.blog.category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required',
        ]);

        Category::create([
            'nama_bidang' => $request->nama_bidang,
            'slug' => Str::slug($request->nama_bidang),
        ]);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.blog.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bidang' => 'required',
        ]);

        $category = Category::find($id);

        $category->update([
            'nama_bidang' => $request->nama_bidang,
            'slug' => Str::slug($request->nama_bidang),
        ]);

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back();
        }
        
        $category->delete();
        return redirect()->route('category.index');
    }
}
