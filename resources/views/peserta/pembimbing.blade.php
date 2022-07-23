@extends('layouts.peserta')
@section('title','Edit Data Pembimbing')
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
                            <h3 class="card-title">Edit Data Pembimbing</h3>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('save.data.pembimbing')}}" enctype="multipart/form-data" method="POST">
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
                                            <div class="alert-text">Maaf, lengkapi biodata dahulu!</div>
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
                                            <label>Nama <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" value="{{$pembimbing->nama}}" name="nama"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                            <select required name="jenis_kelamin" class="form-control">
                                                <option @if ($pembimbing->jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
                                                <option @if ($pembimbing->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" value="{{$pembimbing->tempat_lahir}}" name="tempat_lahir"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="date" required class="form-control" value="{{$pembimbing->tanggal_lahir}}" name="tanggal_lahir"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor HP (WhatsApp) <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" value="{{$pembimbing->no_telp}}" name="no_telp"/>
                                        </div>
                                        <div class="form-group">
                                            <label>NUPTK (Jika ada)</label>
                                            <input type="number" class="form-control" value="{{$pembimbing->nuptk}}" name="nuptk"/>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP (Jika ada)</label>
                                            <input type="number" class="form-control" value="{{$pembimbing->nip}}" name="nip"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelurahan <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" value="{{$pembimbing->kelurahan}}" name="kelurahan"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan <span class="text-danger">*</span></label>
                                            <select name="district_id" required id="district_id" class="form-control">
                                                @if (!empty($pembimbing->district_id))
                                                    <option value="{{$pembimbing->district_id}}">{{$pembimbing->district->name}}, {{$pembimbing->district->regency->name}}, {{$pembimbing->district->regency->province->name}}</option>
                                                @else
                                                    <option></option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jalan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required value="{{$pembimbing->jalan}}" name="jalan"/>
                                        </div>
                                        <div class="form-group">
                                            <label>RT/RW <span class="text-danger">*</span></label>
                                            <input type="text" class="rt_rw form-control" required value="{{$pembimbing->rt_rw}}" name="rt_rw"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Rumah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required value="{{$pembimbing->no_rmh}}" name="no_rmh"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Pos <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" required value="{{$pembimbing->kodepos}}" name="kodepos"/>
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
@section('script')
<script type="text/javascript">

    // CSRF Token
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
@endsection