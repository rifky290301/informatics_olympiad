@extends('layouts.peserta')
@section('title','Edit Sekolah')
@section('content')
<!--begin::Content-->
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
                    
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Sekolah</h3>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('save.sekolah')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                
                                    <div class="card-body">
                                        @if(session('sukses'))
                                            <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                                <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                                                <div class="alert-text">Berhasil memperbarui data!</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                        @if(session('isi'))
                                        <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                            <div class="alert-text">Maaf, lengkapi data sekolah dan simpan dahulu!</div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                        <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                            <div class="alert-text">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label>NPSN <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" readonly value="{{$sekolah->npsn}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input type="text" class="form-control" value="{{$sekolah->nama_sekolah}}" name="nama_sekolah" readonly  placeholder="Nama Sekolah"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Telp. Sekolah <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" value="{{$sekolah->telp_sekolah}}" name="telp_sekolah"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Sekolah <span class="text-danger">*</span></label>
                                            <select required name="jenis_sekolah" class="form-control">
                                                <option @if ($sekolah->jenis_sekolah == 'NEGERI') selected @endif value="NEGERI">NEGERI</option>
                                                <option @if ($sekolah->jenis_sekolah == 'SWASTA') selected @endif value="SWASTA">SWASTA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas<span class="text-danger">*</span></label>
                                            <select name="kelas" required class="form-control">
                                                <option @if ($sekolah->kelas == 10) selected @endif value="10">10</option>
                                                <option @if ($sekolah->kelas == 11) selected @endif value="11">11</option>
                                                <option @if ($sekolah->kelas == 12) selected @endif value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelurahan <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" value="{{$sekolah->kelurahan}}" name="kelurahan"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan <span class="text-danger">*</span></label>
                                            <select name="district_id" required id="district_id" class="form-control">
                                                @if (!empty($sekolah->district_id))
                                                    <option value="{{$sekolah->district_id}}">{{$sekolah->district->name}}, {{$sekolah->district->regency->name}}, {{$sekolah->district->regency->province->name}}</option>
                                                @else
                                                    <option></option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jalan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required value="{{$sekolah->jalan}}" name="jalan"/>
                                        </div>
                                        <div class="form-group">
                                            <label>RT/RW <span class="text-danger">*</span></label>
                                            <input type="text" class="rt_rw form-control" required value="{{$sekolah->rt_rw}}" name="rt_rw"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Rumah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required value="{{$sekolah->no_rmh}}" name="no_rmh"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Pos <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" required value="{{$sekolah->kodepos}}" name="kodepos"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox-inline">
                                                <label class="checkbox">
                                                <input type="checkbox" name="status" value="1" required />
                                                <span></span>Saya sudah memeriksa kembali sebelum menyimpan</label>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
    
                                
                            </div>
                            <div>
                                <button type="submit" class="mb-10 ml-10 btn btn-primary font-weight-bold">Simpan</button>
                                <a type="button" href="{{route('peserta')}}" class="mb-10 mr-10 btn btn-danger font-weight-bold">Kembali</a>
                            </div>
                        </form>
                    </div>
                    
                    
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection