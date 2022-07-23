<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\Tahap;
use App\Models\Karya;
use App\Models\Ujian;
use Storage;
use Carbon\Carbon;
use App\Models\UnggahanTahap;
use App\Models\Biodata;
use DB;

class TahapController extends Controller
{
    public function index()
    {   
        $berkas = Berkas::count();
        if (cek_berkas() < $berkas) {
            return redirect()->route('berkas.index')->with('isi','isi');
        } else {
            if (auth()->user()->profile->lolos == 1) {
                if(request()->ajax())
                {
                    return datatables()->of(Tahap::where('open',1)->select('tahaps.*'))
                    ->editColumn('statuss', function ($data) {
                        if (Carbon::now()->isBefore($data->deadline)) {
                            $mystring = '<span class="label label-success label-pill label-inline mr-2">Buka</span>';
                        } else {
                            $mystring = '<span class="label label-danger label-pill label-inline mr-2">Tutup/Belum Buka</span>';
                        }
                    
                        return $mystring;
                    })
                    ->editColumn('batas', function ($data) {
                        if (Carbon::now()->isBefore($data->deadline)) {
                            $mystring = ''.Carbon::parse($data->deadline)->format('d M Y H:i:s').'';
                        } else {
                            $mystring = '<span class="label label-danger label-pill label-inline mr-2">Tutup/Belum Buka</span>';
                        }
                    
                        return $mystring;
                    })
                    ->editColumn('unggah', function ($data) {
                        if (Carbon::now()->isBefore($data->deadline)) {
                            if (tahap(auth()->user()->profile->id,$data->id)) {
                                $mystring = '<a href="'.route('tahap.show', $data->id).'" class="btn btn-primary mr-2">Buka</a>';
                            } else {
                                $mystring = '<a href="#" class="btn btn-warning mr-2">Belum Dibuka</a>';
                            }
                        } else {
                            // if (cek_karya(auth()->user()->profile->id,$data->id)) {
                            //     $mystring = '<a href="'.route('karya.edit', $data->id).'" class="btn btn-warning mr-2">Buka Karya</a>';
                            // } else {
                                
                            // }
                            $mystring = '<span class="label label-danger label-pill label-inline mr-2">Tutup/Belum Buka dan/atau Tidak Mengunggah Karya</span>';
                        }
                    
                        return $mystring;
                    })
                    ->rawColumns(['statuss','batas','unggah'])
                    ->make(true);
                }
                return view('peserta.tahap');
            } else {
                return redirect()->route('berkas.index');
            }
        }
    }

    public function show($id)
    {
        $tahap = Tahap::find($id);
        if (Carbon::now()->isBefore($tahap->deadline)) {
            if (tahap(auth()->user()->profile->id,$tahap->id)) {

                if(request()->ajax())
                {
                    return datatables()->of(Ujian::where('tahap_id',$tahap->id)->select('ujians.*'))
                    // ->editColumn('edit', function ($data) {
                    //     $mystring = '<a href="'.route("category.edit", $data->id).'" class="btn btn-primary mr-3">Edit</a><a href="'.route("hapus.category", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="btn btn-danger">Hapus</a>';
                    //     return $mystring;
                    // })
                    // ->rawColumns(['edit'])
                    ->make(true);
                }
        
                return view('peserta.ujian', compact('tahap'));
            } else {
                return redirect()->route('karya.index')->with('tidak_lolos','tidak_lolos');
            }
            
        } else {
            return redirect()->route('karya.index');
        }
    }

    public function edit($id)
    {
        $tahap = Tahap::find($id);
        if (tahap(auth()->user()->biodata->id,$tahap->id)) {
            $unggahan = UnggahanTahap::where('tahap_id',$tahap->id)->with('karya', function($q) {
                $q->where('biodata_id', auth()->user()->biodata->id);
            })->get();
    
            return view('peserta.lihat_karya', compact('unggahan','tahap'));
        } else {
            return redirect()->route('karya.index')->with('tidak_lolos','tidak_lolos');
        }
    }

    public function store(Request $request, $id)
    {
        $tahap = Tahap::find($id);
        if (Carbon::now()->isBefore($tahap->deadline)) {
            $unggahan = UnggahanTahap::find($request->unggahan_id);
            if ($unggahan->type == 'url') {
                $request->validate([
                    'unggahan_id' => 'required',
                    'input' => 'required',
                ]);

                DB::beginTransaction();

                try{

                    $tim = Biodata::find(auth()->user()->biodata->id);

                    $tim->update([
                        'ubah_bidang' => 1,
                    ]);

                    
                    if (karya($request->unggahan_id,$tim->id)) {
                        return redirect()->route('karya.show', $id)->with('gagal','Sudah Ada');
                    } else {
                        $tim->karya()->create([
                            'unggahan_id' => $request->unggahan_id,
                            'input' => $request->input,
                        ]);
                    }

                    DB::commit();

                    return redirect()->route('karya.show', $id)->with('sukses','ye');

                } catch(\Exception $e) {
                    DB::rollback();
                    return "gagal";
                }
        
                
            } else if ($unggahan->type == 'file') {
                $request->validate([
                    'unggahan_id' => 'required',
                    'input' => 'required|file|mimes:'.$unggahan->format.'',
                ]);

                DB::beginTransaction();

                try{

                    $tim = Biodata::find(auth()->user()->biodata->id);

                    $tim->update([
                        'ubah_bidang' => 1,
                    ]);

                    if (karya($request->unggahan_id,$tim->id)) {
                        return redirect()->route('karya.show', $id)->with('gagal','Sudah Ada');
                    } else {
                        $tim->karya()->create([
                            'unggahan_id' => $request->unggahan_id,
                            'input' => $request->file('input')->store('karya'),
                        ]);
                    }

                    DB::commit();

                    return redirect()->route('karya.show', $id)->with('sukses','ye');

                } catch(\Exception $e) {
                    DB::rollback();
                    return "gagal";
                }
        
                
            } else {
                $request->validate([
                    'unggahan_id' => 'required',
                    'input' => 'required',
                ]);

                DB::beginTransaction();

                try{

                    $tim = Biodata::find(auth()->user()->biodata->id);

                    $tim->update([
                        'ubah_bidang' => 1,
                    ]);

                    if (karya($request->unggahan_id,$tim->id)) {
                        return redirect()->route('karya.show', $id)->with('gagal','Sudah Ada');
                    } else {
                        $tim->karya()->create([
                            'unggahan_id' => $request->unggahan_id,
                            'input' => $request->input,
                        ]);
                    }

                    DB::commit();

                    return redirect()->route('karya.show', $id)->with('sukses','ye');

                } catch(\Exception $e) {
                    DB::rollback();
                    return "gagal";
                }
            }
        } else {
            return redirect()->route('karya.index');
        }
    }

    public function edit_karya($id,$tahap,$karya)
    {
        $karya = Karya::with('unggahan_tahap.tahap')->find($karya);
        return view('peserta.edit_unggahan', compact('karya'));
    }

    public function destroy($id,$tahap,$karya)
    {
        $karya = Karya::with('unggahan_tahap')->find($karya);
        if (!$karya) {
            return redirect()->back();
        }

        if ($karya->unggahan_tahap->type == 'url') {
            $karya->delete();
        } else if ($karya->unggahan_tahap->type == 'file') {
            Storage::delete($karya->input);
            $karya->delete();
        } else {
            $karya->delete();
        }

        return redirect()->route('karya.show', $id);
    }

    public function update_karya(Request $request,$id,$tahap,$karya)
    {
        $karya = Karya::with('unggahan_tahap.tahap')->find($karya);
        if (Carbon::now()->isBefore($karya->unggahan_tahap->tahap->deadline)) {
            $unggahan = UnggahanTahap::find($karya->unggahan_tahap->id);
            if ($unggahan->type == 'url') {
                $request->validate([
                    'input' => 'required',
                ]);
        
                $karya->update([
                    'input' => $request->input,
                ]);

            } else if ($unggahan->type == 'file') {
                $request->validate([
                    'unggahan_id' => 'required',
                    'input' => 'required|file|mimes:'.$unggahan->format.'',
                ]);

                Storage::delete($karya->input);

                $karya->update([
                    $request->file('input')->store('karya'),
                ]);
        
            } else {

                $request->validate([
                    'input' => 'required',
                ]);
        
                $karya->update([
                    'input' => $request->input,
                ]);
            }
            
            return redirect()->route('karya.show', $id)->with('sukses','ye');
        } else {
            return redirect()->route('karya.index');
        }
    }

    public function detail_karya($id,$tahap,$karya)
    {
        $karya = Karya::with('unggahan_tahap.tahap')->find($karya);
        return view('peserta.detail_unggahan', compact('karya'));
    }
}
