<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\Profile;
use App\Models\Countdown;
use Carbon\Carbon;
use App\Models\UnggahanBerkas;
use Storage;

class BerkasController extends Controller
{
    public function index()
    {
        $countdown = Countdown::find(1);

        if (cek_pembimbing() == 1) {
            $berkas = Berkas::where('status',1)->with('unggahan', function($q) {
                $q->where('profile_id', auth()->user()->profile->id);
            })->get();
            return view('peserta.berkas', compact('berkas'));
        } else {
            return redirect()->route('pembimbing')->with('isi','isi');
        }
    }

    public function store(Request $request)
    {
        $berkas = Berkas::find($request->berkas_id);

        $request->validate([
            'berkas_id' => 'required',
            'berkas' => 'required|file|mimes:'.$berkas->format.'|max:'.$berkas->size.'',
        ]);

        $countdown = Countdown::find(1);

        $biodata = Profile::find(auth()->user()->profile->id);
        if (berkas($request->berkas_id,$biodata->id)) {
            return redirect()->route('berkas.index')->with('gagal','Sudah Ada');
        } else {
            $biodata->unggahan()->create([
                'berkas_id' => $request->berkas_id,
                'berkas' => $request->file('berkas')->store('berkas_administrasi'),
            ]);
        }

        return redirect()->route('berkas.index')->with('sukses','ye');

        
    }

    public function destroy($id)
    {
        $berkas = UnggahanBerkas::find($id);
        if (!$berkas) {
            return redirect()->back();
        }

        Storage::delete($berkas->berkas);
        $berkas->delete();
        return redirect()->route('berkas.index');
    }
}
