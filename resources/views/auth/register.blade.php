@extends('layouts.form')
@section('title','Daftar')
@section('description','Daftar')
@section('style')
<link href="{{asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
<style>
    .select2 {
        width:100%!important;
    }
</style>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">@yield('title')</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Pendaftaran Peserta Informatics Olympiad @php echo date('Y') @endphp</a>
                        @if ($errors->any())
                            <div {{ $attributes }}>
                                <div class="font-medium text-red-600">
                                    {{ __('Whoops! Something went wrong.') }}
                                </div>

                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    @if (now()->isBefore($countdown->pendaftaran))
                    <div class="card card-custom">
                        <div class="card-body p-0">
                            <!--begin::Wizard-->
                            <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                                <!--begin::Wizard Nav-->
                                <div class="wizard-nav border-bottom">
                                    <div class="wizard-steps p-8 p-lg-10">
                                        <!--begin::Wizard Step 1 Nav-->
                                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                            <div class="wizard-label">
                                                <i class="wizard-icon flaticon2-user"></i>
                                                <h3 class="wizard-title">1. Data Diri</h3>
                                            </div>
                                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Wizard Step 1 Nav-->
                                        <!--begin::Wizard Step 2 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-label">
                                                <i class="wizard-icon flaticon-buildings"></i>
                                                <h3 class="wizard-title">2. Data Sekolah</h3>
                                            </div>
                                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Wizard Step 2 Nav-->
                                        <!--begin::Wizard Step 4 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-label">
                                                <i class="wizard-icon flaticon-email"></i>
                                                <h3 class="wizard-title">3. Data Akun</h3>
                                            </div>
                                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Wizard Step 4 Nav-->
                                        <!--begin::Wizard Step 5 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-label">
                                                <i class="wizard-icon flaticon-globe"></i>
                                                <h3 class="wizard-title">4. Review dan Daftar</h3>
                                            </div>
                                            <span class="svg-icon svg-icon-xl wizard-arrow last">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Wizard Step 5 Nav-->
                                    </div>
                                </div>
                                <!--end::Wizard Nav-->
                                <!--begin::Wizard Body-->
                                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-7">
                                        <!--begin::Wizard Form-->
                                        <form method="POST" action="{{route('daftar')}}" class="form" id="kt_form">
                                            @csrf
                                            <!--begin::Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                <h3 class="mb-10 font-weight-bold text-dark">Data Diri</h3>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>NISN</label>
                                                            <input type="text" value="{{old('nisn')}}" class="form-control form-control-solid form-control-lg" name="nisn" placeholder="NISN" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" value="{{old('name')}}" class="form-control form-control-solid form-control-lg" name="name" placeholder="Nama" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-solid form-control-lg">
                                                                <option value="L">Laki - Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Agama</label>
                                                            <input type="text" value="{{old('agama')}}" class="form-control form-control-solid form-control-lg" name="agama" placeholder="Agama" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" value="{{old('tempat_lahir')}}" class="form-control form-control-solid form-control-lg" name="tempat_lahir" placeholder="Tempat Lahir" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" value="{{old('tanggal_lahir')}}" class="form-control form-control-solid form-control-lg" name="tanggal_lahir" placeholder="Tanggal Lahir" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Nomor HP (WhatsApp)</label>
                                                            <input type="text" value="{{old('nohp')}}" class="form-control form-control-solid form-control-lg" name="nohp" placeholder="Nomor HP" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <select name="kelas" id="kelas" class="form-control form-control-solid form-control-lg">
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kelurahan</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="kelurahan" placeholder="Kelurahan" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kecamatan</label>
                                                            <select name="district_id" id="district_id" class="form-control select2">
                                                                <option></option>
                                                            </select>
                                                            <span class="form-text text-muted">Cari berdasarkan kecamatan domisili</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Jalan</label>
                                                            <input type="text" value="{{old('jalan')}}" class="form-control form-control-solid form-control-lg" name="jalan" placeholder="Jalan" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Nomor Rumah</label>
                                                            <input type="text" value="{{old('no_rmh')}}" class="form-control form-control-solid form-control-lg" name="no_rmh" placeholder="Nomor Rumah" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>RT/RW</label>
                                                            <input type="text" value="{{old('rt_rw')}}" class="rt_rw form-control form-control-solid form-control-lg" name="rt_rw" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kode Pos</label>
                                                            <input type="number" value="{{old('kodepos')}}" class="form-control form-control-solid form-control-lg" name="kodepos" placeholder="Kode Pos" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 1-->
                                            <!--begin::Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <h4 class="mb-10 font-weight-bold text-dark">Data Sekolah</h4>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>NPSN</label>
                                                            <input type="text" value="{{old('npsn')}}" class="form-control form-control-solid form-control-lg" name="npsn" placeholder="NPSN" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Nama Sekolah</label>
                                                            <input type="text" value="{{old('nama_sekolah')}}" class="form-control form-control-solid form-control-lg" name="nama_sekolah" placeholder="Nama Sekolah" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Telefon Sekolah</label>
                                                            <input type="text" value="{{old('telp_sekolah')}}" name="telp_sekolah" class="form-control form-control-solid form-control-lg" placeholder="Telefon Sekolah" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Jenis Sekolah</label>
                                                            <select name="jenis_sekolah" id="jenis_sekolah" class="form-control form-control-solid form-control-lg">
                                                                <option value="NEGERI">NEGERI</option>
                                                                <option value="SWASTA">SWASTA</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kelurahan</label>
                                                            <input type="text" name="kelurahan_sekolah" value="{{old('kelurahan_sekolah')}}" class="form-control form-control-solid form-control-lg" placeholder="Kelurahan" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kecamatan</label>
                                                            <select name="district_sekolah_id" id="district_sekolah_id" class="form-control select2">
                                                                <option></option>
                                                            </select>
                                                            <span class="form-text text-muted">Cari berdasarkan kecamatan sekolah</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Jalan</label>
                                                            <input type="text" value="{{old('jalan_sekolah')}}" name="jalan_sekolah" class="form-control form-control-solid form-control-lg" placeholder="Jalan" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Nomor Rumah</label>
                                                            <input type="text" value="{{old('no_rmh_sekolah')}}" class="form-control form-control-solid form-control-lg" name="no_rmh_sekolah" placeholder="Nomor Rumah" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>RT/RW</label>
                                                            <input type="text" value="{{old('rt_rw_sekolah')}}" class="rt_rw form-control form-control-solid form-control-lg" name="rt_rw_sekolah" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kode Pos</label>
                                                            <input type="number" value="{{old('kodepos_sekolah')}}" class="form-control form-control-solid form-control-lg" name="kodepos_sekolah" placeholder="Kode Pos" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 2-->
                                            <!--begin::Wizard Step 4-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <h4 class="mb-10 font-weight-bold text-dark">Data Akun</h4>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Email Pribadi dan Aktif</label>
                                                            <input type="email" class="form-control form-control-solid form-control-lg" name="email" placeholder="Email" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Kata Sandi</label>
                                                            <input type="password" id="password" class="form-control form-control-solid form-control-lg" name="password" placeholder="Kata Sandi" />
                                                            <span class="form-text text-muted">Minimal 8 karakter</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Ulangi Kata Sandi</label>
                                                            <input type="password" class="form-control form-control-solid form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Kata Sandi" />
                                                            <span class="form-text text-muted">Minimal 8 karakter</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Darimana mengetahui Informatics Olympiad</label>
                                                            <select class="form-control form-control-solid form-control-lg" name="info" 
                                                            onchange="if(this.options[this.selectedIndex].value=='customOption'){
                                                                toggleField(this,this.nextSibling);
                                                                this.selectedIndex='0';
                                                            }">
                                                                <option></option>
                                                                <option>Instagram</option>
                                                                <option>Telegram</option>
                                                                <option>Facebook</option>
                                                                <option>Kampus</option>
                                                                <option>Sekolah</option>
                                                                <option>Teman</option>
                                                                <option value="customOption">Lainnya</option>
                                                            </select><input name="info" style="display:none;" class="form-control form-control-solid form-control-lg" disabled="disabled" 
                                                                onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 4-->
                                            <!--begin::Wizard Step 5-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <!--begin::Section-->
                                                <h4 class="mb-10 font-weight-bold text-dark">Cek kembali sebelum mendaftar</h4>
                                            </div>
                                            <!--end::Wizard Step 5-->
                                            <!--begin::Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Daftar</button>
                                                    <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                                </div>
                                            </div>
                                            <!--end::Wizard Actions-->
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                                <!--end::Wizard Body-->
                            </div>
                            <!--end::Wizard-->
                        </div>
                        <!--end::Wizard-->
                    </div>
                    @else
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Maaf Waktu Pendaftaran Habis</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Waktu pendaftaran telah ditutup pada {{\Carbon\Carbon::parse($countdown->pendaftaran)->format('d M Y H:i:s')}}, sampai berjumpa di IO selanjutnya Sobat Prestasi</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('script')
<script src="{{asset('assets/js/pages/custom/wizard/wizard-2.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/jquery-mask.js')}}"></script>
<script type="text/javascript">

    // CSRF Token
    $('.rt_rw').mask('000/000', {
        placeholder: "000/000"
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#district_id" ).select2({
        placeholder: "Pilih Kecamatan",
        ajax: { 
          url: "{{route('kecamatan')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              _token: CSRF_TOKEN,
              search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });

    });
    
</script>
<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    $(document).ready(function(){

      $( "#district_sekolah_id" ).select2({
        placeholder: "Pilih Kecamatan Sekolah",
        ajax: { 
          url: "{{route('kecamatan')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              _token: CSRF_TOKEN,
              search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });

    });
    
</script>
<script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#province_id" ).select2({
        placeholder: "Pilih Provinsi Sekolah",
        ajax: { 
          url: "{{route('province')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              _token: CSRF_TOKEN,
              search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

      });

    });
</script>
<script>
    function toggleField(hideObj,showObj){
      hideObj.disabled=true;        
      hideObj.style.display='none';
      showObj.disabled=false;   
      showObj.style.display='inline';
      showObj.focus();
    }
</script>
@endsection