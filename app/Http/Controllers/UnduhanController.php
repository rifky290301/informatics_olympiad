<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Unduhan;
use App\Models\Post;
use Storage;

class UnduhanController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Unduhan::with('post')->select('unduhans.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("hapus.lampiran", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="btn btn-danger">Hapus</a>';
                return $mystring;
            })
            ->editColumn('file', function ($data) {
                if ($data->type == 0)
                {
                    $berkas = '<a href="'.asset('uploads/'.$data->berkas).'" class="btn btn-success">Buka Berkas</a>';
                }

                else if ($data->type == 1)
                {
                    $berkas = '<a href="'.$data->url.'" class="btn btn-success">Buka Tautan</a>';
                }

                return $berkas;
            })
            ->rawColumns(['edit','file'])
            ->make(true);
        }
        return view('admin.blog.unduhan.index');
    }

    public function post(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $post = Post::orderby('judul','asc')->limit(5)->get();
        } else {
            $post = Post::orderby('judul','asc')
            ->where('judul', 'like', '%' .$search . '%')
            ->get();
        }
        $response = array();
        foreach($post as $item){
            $response[] = array(
                "id"=>$item->id,
                "text"=>$item->judul,
            );
        }
        echo json_encode($response);
        exit;
    }

    public function create()
    {
        return view('admin.blog.unduhan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'type' => 'required',
            'post_id' => 'required',
        ]);

        if ($request->type == 0) {
            Unduhan::create([
                'judul' => $request->judul,
                'type' => $request->type,
                'post_id' => $request->post_id,
                'berkas' => $request->file('berkas')->store('unduhan'), 
            ]);
        } else if ($request->type == 1) {
            Unduhan::create([
                'judul' => $request->judul,
                'type' => $request->type,
                'post_id' => $request->post_id,
                'url' => $request->url,
            ]);
        }

        return redirect()->route('lampiran.index');
    }

    public function edit($id)
    {
        $unduhan = Unduhan::find($id);
        return view('admin.blog.unduhan.edit', compact('unduhan'));        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'type' => 'required',
            'post_id' => 'required',
        ]);
        
        $file = Unduhan::find($id);

        if ($file->type == $request->type) {
            if ($request->type == 0) {
                Storage::delete($file->berkas);
                $file->update([
                    'judul' => $request->judul,
                    'type' => $request->type,
                    'post_id' => $request->post_id,
                    'berkas' => $request->file('berkas')->store('unduhan'), 
                ]);
            } else if ($request->type == 1) {
                $file->update([
                    'judul' => $request->judul,
                    'type' => $request->type,
                    'post_id' => $request->post_id,
                    'url' => $request->url,
                ]);
            }
        } else {
            if (empty($file->berkas)) {
                if ($request->type == 0) {
                    Storage::delete($file->berkas);
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'post_id' => $request->post_id,
                        'berkas' => $request->file('berkas')->store('unduhan'), 
                    ]);
                } else if ($request->type == 1) {
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'post_id' => $request->post_id,
                        'url' => $request->url,
                    ]);
                }
            } else {
                Storage::delete($file->berkas);
                if ($request->type == 0) {
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'post_id' => $request->post_id,
                        'berkas' => $request->file('berkas')->store('unduhan'), 
                    ]);
                } else if ($request->type == 1) {
                    $file->update([
                        'judul' => $request->judul,
                        'type' => $request->type,
                        'post_id' => $request->post_id,
                        'url' => $request->url,
                    ]);
                }
            }
        }

        return redirect()->route('lampiran.index');
      }
 
    public function destroy($id)
    {
        $file = Unduhan::find($id);

        if (!$file) {
            return redirect()->back();
        }
        
        if (!empty($file->berkas))
        {
            Storage::delete($file->berkas);
        }
        
        $file->delete();
        return redirect()->route('lampiran.index');
    }      
}
