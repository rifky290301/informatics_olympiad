<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Sekolah;
use App\Models\Bidang;
use App\Models\OrangTua;
use App\Models\TahapBiodata;
use App\Models\Pembimbing;
use App\Models\Tahap;
use App\Models\UnggahanBerkas;
use DB;
use Storage;

class DashboardPesertaController extends Controller
{
    public function dashboard()
    {
        return view('peserta.dashboard');
    }

    public function akun()
    {
        $user = User::find(auth()->user()->id);
        return view('peserta.akun', compact('user'));
    }

    public function save_akun(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::find(auth()->user()->id);

        if (empty($request->password)) {
            $user->update([
                'name' => ucwords($request->name),
                'email' => $request->email,
            ]);
            return redirect()->route('akun')->with('sukses','Hore');

        } else {
            $user->update([
                'name' => ucwords($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
        
            return redirect()->route('login')->with('password','sukses');
        }
    }

    public function biodata()
    {
        $biodata = Profile::with('district.regency.province')->find(auth()->user()->profile->id);
        return view('peserta.biodata', compact('biodata'));
    }

    public function save_biodata(Request $request)
    {
        $request->validate([
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status' => 'required',
            'nohp' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kodepos' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $biodata = Profile::find(auth()->user()->profile->id);

        if (empty($request->file('foto'))) {
            $biodata->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nohp' => $request->nohp,
                'jalan' => $request->jalan,
                'no_rmh' => $request->no_rmh,
                'rt_rw' => $request->rt_rw,
                'kodepos' => $request->kodepos,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'district_id' => $request->district_id,
            ]);
        } else {
            Storage::delete($biodata->foto);
            $biodata->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nohp' => $request->nohp,
                'jalan' => $request->jalan,
                'no_rmh' => $request->no_rmh,
                'rt_rw' => $request->rt_rw,
                'kodepos' => $request->kodepos,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'district_id' => $request->district_id,
                'foto' => $request->file('foto')->store('profile'), 
            ]);
        }

        return redirect()->route('biodata')->with('sukses','Hore');
    }

    public function sekolah()
    {
        if (cek_biodata() == 1) {
            $sekolah = Sekolah::with('district.regency.province')->find(auth()->user()->profile->sekolah->id);
            return view('peserta.sekolah', compact('sekolah'));
        } else {
            return redirect()->route('biodata')->with('isi','isi');
        }
        
        
    }

    public function save_sekolah(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'kelas' => 'required',
            'status' => 'required',
            'telp_sekolah' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kodepos' => 'required',
        ]);

        $sekolah = Sekolah::find(auth()->user()->profile->sekolah->id);

        $sekolah->update([
            'nama_sekolah' => $request->nama_sekolah,
            'telp_sekolah' => $request->telp_sekolah,
            'jenis_sekolah' => $request->jenis_sekolah,
            'kelas' => $request->kelas,
            'jalan' => $request->jalan,
            'kelurahan' => $request->kelurahan,
            'district_id' => $request->district_id,
            'no_rmh' => $request->no_rmh,
            'rt_rw' => $request->rt_rw,
            'kodepos' => $request->kodepos,
            'status' => $request->status,
        ]);

        return redirect()->route('sekolah')->with('sukses','Hore');
    }

    public function sinkron(Request $request)
    {
        $nisn = $request->val;
        $response = Http::withBasicAuth('puspresnas', 'Pu5pReSn4s123!@#')->post('https://pelayanan.data.kemdikbud.go.id/api/puspresnas/siswa?id='.$nisn.'');
        $data = $response->json();
        return $data;
    }

    public function sinkron_sekolah(Request $request)
    {
        $npsn = $request->val;
        $response = Http::withBasicAuth('puspresnas', 'Pu5pReSn4s123!@#')->post('https://pelayanan.data.kemdikbud.go.id/api/puspresnas/sekolah?id='.$npsn.'');
        $data = $response->json();
        return $data;
    }

    public function orangtua()
    {
        if (cek_sekolah() == 1) {
            $ortu = OrangTua::find(auth()->user()->biodata->ayahibu->id);
            return view('peserta.orangtua', compact('ortu'));
        } else {
            return redirect()->route('sekolah')->with('isi','isi');
        }
        
    }

    public function save_data_orangtua(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_terakhir_ibu' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'pendidikan_terakhir_ayah' => 'required',
            'nohp_ibu' => 'required',
            'nohp_ayah' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kodepos' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
        ]);

        $ortu = OrangTua::find(auth()->user()->biodata->ayahibu->id);

        $ortu->update([
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_terakhir_ibu' => $request->pendidikan_terakhir_ibu,
            'nohp_ibu' => $request->nohp_ibu,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pendidikan_terakhir_ayah' => $request->pendidikan_terakhir_ayah,
            'nohp_ayah' => $request->nohp_ayah,
            'status' => $request->status,
            'kelurahan' => $request->kelurahan,
            'district_id' => $request->district_id,
            'jalan' => $request->jalan,
            'no_rmh' => $request->no_rmh,
            'rt_rw' => $request->rt_rw,
            'kodepos' => $request->kodepos,
        ]);

        return redirect()->route('orangtua')->with('sukses','Hore');
    }

    public function pembimbing()
    {
        if (cek_sekolah() == 1) {
            $pembimbing = Pembimbing::with('district.regency.province')->find(auth()->user()->profile->pembimbing->id);
            return view('peserta.pembimbing', compact('pembimbing'));
        } else {
            return redirect()->route('sekolah')->with('isi','isi');
        }
        
    }

    public function save_data_pembimbing(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
            'kodepos' => 'required',
            'status' => 'required',
        ]);

        $pembimbing = Pembimbing::find(auth()->user()->profile->pembimbing->id);

        $pembimbing->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            
            'no_telp' => $request->no_telp,
     
            'nuptk' => $request->nuptk,
            'nip' => $request->nip,
            'jalan' => $request->jalan,
            'no_rmh' => $request->no_rmh,
            'rt_rw' => $request->rt_rw,
            'status' => $request->status,
            'kelurahan' => $request->kelurahan,
            'district_id' => $request->district_id,
            'kodepos' => $request->kodepos,
        ]);
        
        
        return redirect()->route('pembimbing')->with('sukses','Hore');
    }
}
