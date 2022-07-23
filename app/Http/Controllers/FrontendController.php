<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Countdown;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $post = Post::with('category','user')->latest()->take(5)->get();
        $time = Countdown::find(1);
        return view('welcome', compact('post','time'));
    }

    public function tentang()
    {
        return view('frontend.about');
    }

    public function post()
    {
        $data = Post::with('user','category')->latest()->paginate(5);
        return view('frontend.post', compact('data'));
    }

    function fetch_data_post(Request $request)
    {
        if($request->ajax())
        {
            $data = Post::with('user','category')->latest()->paginate(5);

            return view('frontend.post_ajax', compact('data'))->render();
        }
    }

    public function post_category()
    {

    }

    public function detail_post(Category $category, Post $post)
    {
        $detail = $post->load('user','category','unduhan');
        return view('frontend.detail_post', compact('detail'));
    }

    public function kecamatan(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $kecamatan = District::with('regency.province')->orderby('name','asc')->limit(5)->get();
        } else {
            $kecamatan = District::with('regency.province')->orderby('name','asc')
            ->where('name', 'like', '%' .$search . '%')
            ->orWhereHas('regency', function($q) use ($search){
                $q->where('name', 'like', '%' .$search . '%');
            })
            ->orWhereHas('regency', function($q) use ($search){
                $q->whereHas('province', function($q) use ($search){
                $q->where('name', 'like', '%' .$search . '%');
                });
            })
            ->get();
        }
    
        $response = array();
        foreach($kecamatan as $item){
            $response[] = array(
                "id"=>$item->id,
                "text"=>$item->name.', '.$item->regency->name.', '.$item->regency->province->name,
            );
        }
    
        echo json_encode($response);
        exit;
    }

    public function province(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $province = Province::orderby('name','asc')->select('id','name')->limit(34)->get();
        } else {
            $province = Province::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
    
        $response = array();
        foreach($province as $item){
            $response[] = array(
                "id"=>$item->id,
                "text"=>$item->name
            );
        }
    
        echo json_encode($response);
        exit;
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|unique:profiles',
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nohp' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kodepos' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'nama_sekolah' => 'required',
            'kelas' => 'required',
            'jenis_sekolah' => 'required',
            'npsn' => 'required',
            'telp_sekolah' => 'required',
            'kelurahan_sekolah' => 'required',
            'district_sekolah_id' => 'required',
            'jalan_sekolah' => 'required',
            'info' => 'required',
            'no_rmh_sekolah' => 'required',
            'rt_rw_sekolah' => 'required',
            'kodepos_sekolah' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator);
        } else {
            DB::beginTransaction();

            try{
        
                $user = User::create([
                    'name' => ucwords($request->name),
                    'email' => strtolower($request->email),
                    'password' => Hash::make($request->password),
                    'role' => 2,
                ]);
        
                $profile = $user->profile()->create([
                    'nisn' => $request->nisn,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'agama' => $request->agama,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'nohp' => $request->nohp,
                    'jalan' => $request->jalan,
                    'no_rmh' => $request->no_rmh,
                    'rt_rw' => $request->rt_rw,
                    'kodepos' => $request->kodepos,
                    'kelurahan' => $request->kelurahan,
                    'info' => $request->info,
                    'district_id' => $request->district_id,
                ]);
        
                $profile->sekolah()->create([
                    'npsn' => $request->npsn,
                    'nama_sekolah' => $request->nama_sekolah,
                    'telp_sekolah' => $request->telp_sekolah,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'jalan' => $request->jalan_sekolah,
                    'kelurahan' => $request->kelurahan_sekolah,
                    'district_id' => $request->district_sekolah_id,
                    'no_rmh' => $request->no_rmh_sekolah,
                    'rt_rw' => $request->rt_rw_sekolah,
                    'kodepos' => $request->kodepos_sekolah,
                    'kelas' => $request->kelas,
                    'status' => 0,
                ]);

                $profile->pembimbing()->create([]);
        
                DB::commit();

                event(new Registered($user));

                Auth::login($user);

                return redirect(RouteServiceProvider::PESERTA);
        
            } catch(\Exception $e) {
                DB::rollback();
                return "gagal";
            }
        }
    }
}
