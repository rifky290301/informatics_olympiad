<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Category;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Post::with('category','user')->select('posts.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("post.edit", $data->id).'" class="btn btn-primary mr-3">Edit</a><a href="'.route("hapus.post", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="btn btn-danger">Hapus</a>';
                return $mystring;
            })
            
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.blog.post.index');
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.blog.post.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        auth()->user()->post()->create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'thumbnail' => $request->file('thumbnail')->store('post'),
        ]);

        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        return view('admin.blog.post.edit', compact('post','category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $post = Post::find($id);

        if (empty($request->file('thumbnail'))) {
            $post->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'content' => $request->content,
                'category_id' => $request->category_id,
            ]);
        } else {
            Storage::delete($post->thumbnail);
            $post->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'content' => $request->content,
                'category_id' => $request->category_id,
                'thumbnail' => $request->file('thumbnail')->store('post'),
            ]);
        }

        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back();
        }
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect()->route('post.index');
    }
}
