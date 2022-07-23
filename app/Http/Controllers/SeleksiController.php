<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Bidang;

class SeleksiController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Profile::with('user','sekolah')->select('profiles.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route('seleksi.edit', $data->id).'" class="btn btn-primary mr-3">Detail</a>';
                return $mystring;
            })
            ->editColumn('st', function ($data) {
                if ($data->lolos == 0) {
                    $mystring = '<span class="label label-danger label-pill label-inline mr-2">Tidak Lolos</span>';
                } elseif ($data->lolos == 1) {
                    $mystring = '<span class="label label-success label-pill label-inline mr-2">Lolos</span>';
                } else {
                    $mystring = '<span class="label label-warning label-pill label-inline mr-2">Belum Ditentukan</span>';
                }
                
                return $mystring;
            })
            ->rawColumns(['edit','st'])
            ->make(true);
        }
        return view('admin.seleksi.index');
    }

    public function edit($id)
    {
        $profile = Profile::with('user','sekolah','pembimbing','unggahan.berkasss','district.regency.province')->find($id);
        return view('admin.seleksi.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lolos' => 'required',
        ]);

       

        $biodata = Profile::find($id);
        $biodata->update([
            'lolos' => $request->lolos,
        ]);

        return redirect()->route('seleksi.index');
    }

    
}
