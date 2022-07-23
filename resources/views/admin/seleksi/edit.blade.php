@extends('layouts.admin')
@section('title','Seleksi Berkas')
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
                            <h3 class="card-title">@yield('title')</h3>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('seleksi.update', $profile->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <div class="card-body">
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
                                    <div class="d-flex mb-9">
                                        <!--begin: Pic-->
                                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                            <div class="symbol symbol-50 symbol-lg-120">
                                                @if (empty($profile->foto))
                                                    <img src="{{asset('assets/media/svg/avatars/001-boy.svg')}}" alt="image" />
                                                @else
                                                    <img src="{{asset('uploads/'.$profile->foto)}}" style="object-fit: cover" alt="image" />
                                                @endif
                                                
                                            </div>
                                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                                <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                                            </div>
                                        </div>
                                        <!--end::Pic-->
                                        <!--begin::Info-->
                                        <div class="flex-grow-1">
                                            <!--begin::Title-->
                                            <div class="d-flex justify-content-between flex-wrap mt-1">
                                                <div class="d-flex mr-3">
                                                    <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$profile->user->name}}</a>
                                                    <a href="#">
                                                        <i class="flaticon2-correct text-success font-size-h5"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-wrap justify-content-between mt-1">
                                                <div class="d-flex flex-column flex-grow-1 pr-8">
                                                    <div class="d-flex flex-wrap mb-4">
                                                        <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                        <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$profile->user->email}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Info-->
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>NISN <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" readonly value="{{$profile->nisn}}"/>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select  readonly name="jenis_kelamin" class="form-control">
                                            <option @if ($profile->jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
                                            <option @if ($profile->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" readonly value="{{$profile->tempat_lahir}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date"  class="form-control" value="{{$profile->tanggal_lahir}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor HP (WhatsApp) <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" value="{{$profile->nohp}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan <span class="text-danger">*</span></label>
                                        <input readonly type="text"  class="form-control" value="{{$profile->kelurahan}}" name="kelurahan"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan <span class="text-danger">*</span></label>
                                        <select readonly name="district_id"  id="district_id" class="form-control">
                                            @if (!empty($profile->district_id))
                                                <option value="{{$profile->district_id}}">{{$profile->district->name}}, {{$profile->district->regency->name}}, {{$profile->district->regency->province->name}}</option>
                                            @else
                                                <option></option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jalan <span class="text-danger">*</span></label>
                                        <input readonly type="text" class="form-control"  value="{{$profile->jalan}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>RT/RW <span class="text-danger">*</span></label>
                                        <input readonly type="text" class="rt_rw form-control"  value="{{$profile->rt_rw}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Rumah <span class="text-danger">*</span></label>
                                        <input readonly type="text" class="form-control"  value="{{$profile->no_rmh}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos <span class="text-danger">*</span></label>
                                        <input readonly type="number" class="form-control"  value="{{$profile->kodepos}}"/>
                                    </div>
                                    <div class="alert alert-primary" role="alert">
                                        Sekolah
                                    </div>
                                    <div class="form-group">
                                        <label>NPSN <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" readonly value="{{$profile->sekolah->npsn}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Sekolah</label>
                                        <input type="text" class="form-control" value="{{$profile->sekolah->nama_sekolah}}" readonly  placeholder="Nama Sekolah"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Telp. Sekolah <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" value="{{$profile->sekolah->telp_sekolah}}" readonly />
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas <span class="text-danger">*</span></label>
                                        
                                        <select name="kelas" readonly class="form-control" id="kelas">
                                            <option @if ($profile->sekolah->kelas == 10) selected @endif value="10">10</option>
                                            <option @if ($profile->sekolah->kelas == 11) selected @endif value="11">11</option>
                                            <option @if ($profile->sekolah->kelas == 12) selected @endif value="12">12</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Sekolah <span class="text-danger">*</span></label>
                                        <select  readonly class="form-control">
                                            <option @if ($profile->sekolah->status == 'NEGERI') selected @endif value="NEGERI">NEGERI</option>
                                            <option @if ($profile->sekolah->status == 'SWASTA') selected @endif value="SWASTA">SWASTA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" value="{{$profile->sekolah->kelurahan}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan <span class="text-danger">*</span></label>
                                        <select name="district_id" readonly  id="district_id" class="form-control">
                                            @if (!empty($profile->sekolah->district_id))
                                                <option value="{{$profile->sekolah->district_id}}">{{$profile->sekolah->district->name}}, {{$profile->sekolah->district->regency->name}}, {{$profile->sekolah->district->regency->province->name}}</option>
                                            @else
                                                <option></option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jalan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" readonly  value="{{$profile->sekolah->jalan}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>RT/RW <span class="text-danger">*</span></label>
                                        <input type="text" class="rt_rw form-control"  value="{{$profile->sekolah->rt_rw}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Rumah <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  value="{{$profile->sekolah->no_rmh}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control"  value="{{$profile->sekolah->kodepos}}" readonly/>
                                    </div>

                                    <div class="alert alert-primary" role="alert">
                                        Pembimbing
                                    </div>

                                    <div class="form-group">
                                        <label>Nama <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" readonly value="{{$profile->pembimbing->nama}}"/>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                        <select  readonly name="jenis_kelamin" class="form-control">
                                            <option @if ($profile->pembimbing->jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
                                            <option @if ($profile->pembimbing->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" readonly value="{{$profile->pembimbing->tempat_lahir}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date"  class="form-control" value="{{$profile->pembimbing->tanggal_lahir}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telp <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" value="{{$profile->pembimbing->no_telp}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>NUPTK </label>
                                        <input type="text"  class="form-control" value="{{$profile->pembimbing->nuptk}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>NIP </label>
                                        <input type="text"  class="form-control" value="{{$profile->pembimbing->nip}}" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan <span class="text-danger">*</span></label>
                                        <input readonly type="text"  class="form-control" value="{{$profile->pembimbing->kelurahan}}" name="kelurahan"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan <span class="text-danger">*</span></label>
                                        <select readonly name="district_id"  id="district_id" class="form-control">
                                            @if (!empty($profile->pembimbing->district_id))
                                                <option value="{{$profile->pembimbing->district_id}}">{{$profile->pembimbing->district->name}}, {{$profile->pembimbing->district->regency->name}}, {{$profile->pembimbing->district->regency->province->name}}</option>
                                            @else
                                                <option></option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jalan <span class="text-danger">*</span></label>
                                        <input readonly type="text" class="form-control"  value="{{$profile->pembimbing->jalan}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>RT/RW <span class="text-danger">*</span></label>
                                        <input readonly type="text" class="rt_rw form-control"  value="{{$profile->pembimbing->rt_rw}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Rumah <span class="text-danger">*</span></label>
                                        <input readonly type="text" class="form-control"  value="{{$profile->pembimbing->no_rmh}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos <span class="text-danger">*</span></label>
                                        <input readonly type="number" class="form-control"  value="{{$profile->pembimbing->kodepos}}"/>
                                    </div>

                                    <div class="alert alert-primary" role="alert">
                                      Berkas
                                    </div>
                                    @forelse ($profile->unggahan as $item)
                                    <div class="flex flex-col mb-4">
                                        <div>
                                            <h2>{{$item->berkasss->nama_berkas}}</h2>
                                            <embed style="width: 100%; height: 500px" class="embed-responsive-item" src="{{asset('uploads/'.$item->berkas)}}">
                                        </div>
                                        <h2>atau</h2>
                                        <div class="m-5"><a target="_blank" type="button" href="{{asset('uploads/'.$item->berkas)}}"
                                            class="btn btn-success">Buka di Tab Baru</a></div>
                                    </div>
                                    @empty
                                    <div class="alert alert-danger" role="alert">
                                        Belum ada berkas
                                    </div>
                                    @endforelse
                                    <div class="form-group">
                                      <label>Kelolosan <span class="text-danger">*</span></label>
                                      <select required name="lolos" class="form-control">
                                          <option @if ($profile->lolos == 0) selected @endif value="0">Tidak Lolos</option>
                                          <option @if ($profile->lolos == 1) selected @endif value="1">Lolos</option>
                                          <option @if ($profile->lolos == 2) selected @endif value="2">Belum Ditentukan</option>
                                      </select>
                                  </div>
                                    
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="mb-10 ml-10 btn btn-primary font-weight-bold">Simpan</button>
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