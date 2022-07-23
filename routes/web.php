<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardPesertaController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UnduhanController;
use App\Http\Controllers\WaController;
use App\Http\Controllers\TahapController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SeleksiController;


Route::get('/', [FrontendController::class, 'index'])->name('landing');
Route::get('/tentang', [FrontendController::class, 'tentang'])->name('about');
Route::get('/teswa', [WaController::class, 'index'])->name('teswa');
Route::post('/teswa', [WaController::class, 'store'])->name('teswa-send');
Route::get('/post', [FrontendController::class, 'post'])->name('post');
Route::get('/fetch_data', [FrontendController::class, 'fetch_data_post'])->name('load_post');
Route::get('/post/{category}', [FrontendController::class, 'post_category'])->name('post_category');
Route::get('/post/{category}/{post}', [FrontendController::class, 'detail_post'])->name('detail_post');

Route::post('kecamatan', [FrontendController::class, 'kecamatan'])->name('kecamatan');
Route::post('province', [FrontendController::class, 'province'])->name('province');
Route::middleware(['guest'])->group(function () {
    Route::any('registration', [FrontendController::class, 'registration'])->name('daftar');
});
Route::group(['prefix' => 'peserta', 'middleware' => ['auth','peserta']], function(){
    Route::get('/dashboard', [DashboardPesertaController::class, 'dashboard'])->name('peserta');
    Route::get('/akun', [DashboardPesertaController::class, 'akun'])->name('akun');
    Route::put('/akun', [DashboardPesertaController::class, 'save_akun'])->name('save.akun');
    Route::get('/biodata', [DashboardPesertaController::class, 'biodata'])->name('biodata');
    Route::put('/biodata', [DashboardPesertaController::class, 'save_biodata'])->name('save.biodata');
    Route::get('/sekolah', [DashboardPesertaController::class, 'sekolah'])->name('sekolah');
    Route::put('/sekolah', [DashboardPesertaController::class, 'save_sekolah'])->name('save.sekolah');
    Route::get('/pembimbing', [DashboardPesertaController::class, 'pembimbing'])->name('pembimbing');
    Route::put('/pembimbing', [DashboardPesertaController::class, 'save_data_pembimbing'])->name('save.data.pembimbing');
    Route::resource('berkas', BerkasController::class);
    Route::get('berkas/{id}/delete', [BerkasController::class, 'destroy'])->name('hapus.berkas');
    Route::resource('tahap', TahapController::class);
    Route::get('tahap/{id}/delete', [TahapController::class, 'destroy'])->name('hapus.tahap');

    Route::get('tahap/{id}/ujian', [UjianController::class, 'ujian'])->name('ujian.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){
    Route::get('/dashboard', [DashboardAdminController::class, 'dashboard'])->name('admin');
    Route::get('/informasi', [DashboardAdminController::class, 'informasi'])->name('informasi');
    Route::resource('category', CategoryController::class);
    Route::get('category/{id}/delete', [CategoryController::class, 'destroy'])->name('hapus.category');
    Route::resource('post', PostController::class);
    Route::get('post/{id}/delete', [PostController::class, 'destroy'])->name('hapus.post');
    Route::post('list-post', [UnduhanController::class, 'post'])->name('list_post');
    Route::resource('lampiran', UnduhanController::class);
    Route::get('lampiran/{id}/delete', [UnduhanController::class, 'destroy'])->name('hapus.lampiran');
    Route::resource('seleksi', SeleksiController::class);
    Route::get('seleksi/{id}/delete', [SeleksiController::class, 'destroy'])->name('hapus.seleksi');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
