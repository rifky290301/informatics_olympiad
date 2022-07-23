<?php

use App\Models\Bidang;
use App\Models\UnggahanBerkas;
use App\Models\Tim;
use App\Models\Karya;
use App\Models\Profile;
use App\Models\Ketua;
use App\Models\Sekolah;
use App\Models\Anggota;
use App\Models\OrangTua;
use App\Models\NisnJuara;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Pembimbing;
use App\Models\TahapPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

function cek_biodata()
{
    $biodata = Profile::find(auth()->user()->profile->id);
    return $biodata->status;
}

function cek_berkelompok($id)
{
    $bidang = Bidang::find($id);
    return $bidang->kelompok;
}

function berkas($berkas,$profile)
{
    return UnggahanBerkas::where('berkas_id',$berkas)->where('profile_id',$profile)->exists();
}

function kode($kode)
{
    return Ketua::where('kode',$kode)->first();
}

function ketua($nisn)
{
    return Ketua::where('nisn',$nisn)->first();
}

function bidang_ketua($id)
{
    $biodata = Ketua::with('tim')->find($id);
    return $biodata->tim->jumlah_anggota;
}

function karya($unggahan,$biodata)
{
    return Karya::where('unggahan_id',$unggahan)->where('biodata_id',$biodata)->exists();
}

function cek_karya($biodata,$tahap)
{
    return Karya::where('biodata_id',$biodata)->whereHas('unggahan_tahap', function($q) use ($tahap){
        $q->where('tahap_id', $tahap);
    })->exists();
}

function tahap($biodata,$tahap)
{
    return TahapPeserta::where('profile_id',$biodata)->where('tahap_id',$tahap)->exists();
}

function lolos($id)
{
    $tim = Tim::find($id);
    return $tim->lolos;
}

function cek_jumlah_anggota($tim)
{
    $tim = Tim::find($tim);
    $anggota = Anggota::where('tim_id',$tim)->count();
    if ($anggota <= $tim->jumlah_anggota) {
        return True;
    } else {
        return False;
    }
}

function cek_jumlah_anggotas($tim)
{
    $tims = Tim::whereHas('ketua', function($q) use ($tim){
        $q->where('kode', $tim);
    })->first();
    $anggota = Anggota::whereHas('tim', function($q) use ($tim){
        $q->whereHas('ketua', function($q) use ($tim){
            $q->where('kode', $tim);
        });
    })->count();
    if ($anggota < $tims->jumlah_anggota) {
        return False;
    } else {
        return True;
    }
}


function cek_anggota($kode)
{
    return Anggota::whereHas('tim', function($q) use ($kode){
        $q->whereHas('ketua', function($q) use ($kode){
            $q->where('kode', $kode);
        });
    })->count();
}

function cek_peserta($bidang,$npsn)
{
    return Ketua::
    whereHas('tim', function($q) use ($bidang,$npsn){
        $q->where('bidang_id', $bidang)->whereHas('sekolah', function($q) use ($npsn){
            $q->where('npsn', $npsn);
        });
    })
    ->exists();
}

function juara($nisn,$bidang)
{
    return NisnJuara::where('nisn',$nisn)->where('bidang_id',$bidang)->exists();
}

function juarsa($nisn,$bidang)
{
    $nisn = NisnJuara::where('nisn',$nisn)->where('bidang_id',$bidang)->first();
    return $nisn;
}

function cek_biodata_anggota()
{
    $biodata = Anggota::find(auth()->user()->anggota->id);
    return $biodata->status;
}

function cek_sekolah()
{
    $sekolah = Sekolah::find(auth()->user()->profile->sekolah->id);
    return $sekolah->status;
}

function cek_ortu()
{
    $ortu = OrangTua::find(auth()->user()->biodata->ayahibu->id);
    return $ortu->status;
}

function cek_pembimbing()
{
    $guru = Pembimbing::find(auth()->user()->profile->pembimbing->id);
    return $guru->status;
}

function cek_berkas()
{
    $berkas = UnggahanBerkas::where('profile_id',auth()->user()->profile->id)->count();
    return $berkas;
}

function nisn($nisn)
{
    return Biodata::where('nisn',$nisn)->exists();
}

function nik($nik)
{
    return Biodata::where('nik',$nik)->exists();
}

function nik_anggota($nik)
{
    return Anggota::where('nik',$nik)->exists();
}

function nisn_anggota($nisn)
{
    return Anggota::where('nisn',$nisn)->exists();
}

function email($email)
{
    return User::where('email',$email)->exists();
}

function embed_video($url)
{
    $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
    preg_match($regExp, $url, $video);
    return 'https://www.youtube.com/embed/'.$video[7];
}

function thumbnail($url)
{
    $response = Http::get('https://www.youtube.com/oembed?url='.$url.'&format=json');
    $data = $response->json();
    return $data['thumbnail_url'];
}

function thumbnail_video($url)
{
    $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
    preg_match($regExp, $url, $video);
    return 'https://img.youtube.com/vi/'.$video[7].'/maxresdefault.jpg';
}

function persentase_daftar($count)
{
    return (($count/Tim::count())*100);
}

function persentase_unggah($count)
{
    return (($count/Tim::has('karya_provinsi')->count())*100);
}

function peserta($prov)
{
    $tes = Bidang::with(['bidang_provinsi' => function($q) use($prov) {
        $q->where('province_id',$prov)->withCount('tim')->withCount(['pengunggah' => function($q) {
            $q->has('karya_provinsi');
        }]);
    }])->get();

    $hasil = '';

    foreach ($tes as $data) {
        $pendaftar= 0;
        $pengunggah= 0;
        foreach ($data->bidang_provinsi as $items) {
            $pendaftar += $items->tim_count;
            $pengunggah += $items->pengunggah_count;
        }
        $hasil .= '<li> Pendaftar '.$data->nama_bidang.' : '.$pendaftar.'</li><li> Pengunggah '.$data->nama_bidang.' : '.$pengunggah.'</li>';
    }

    return $hasil;

}

function cek_administrasi()
{
    $berkas = Berkas::where('bidang_id',auth()->user()->ketua->tim->bidang_id)->count();
    if (cek_berkas() < $berkas) {
        return False;
    }

    return True;
}