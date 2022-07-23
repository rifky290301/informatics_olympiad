@extends('layouts.admin')
@section('title','Tambah Unduhan')
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
                            <h3 class="card-title">Tambah Unduhan</h3>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('lampiran.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
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
                                    <div class="form-group">
                                        <label>Judul <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="judul"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Type <span class="text-danger">*</span></label>
                                        <select name="type" required class="form-control">
                                            <option value="0">Berkas</option>
                                            <option value="1">Tautan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>URL (Jika pilih tautan) <span class="text-danger">*</span></label>
                                        <input type="url" class="form-control" name="url"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Berkas (Jika pilih berkas) <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="berkas"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Post <span class="text-danger">*</span></label>
                                        <select name="post_id" required id="post_id" class="form-control">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="mb-10 ml-10 btn btn-primary font-weight-bold">Simpan</button>
                                <a type="button" href="{{route('admin')}}" class="mb-10 mr-10 btn btn-danger font-weight-bold">Kembali</a>
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

      $( "#post_id" ).select2({
        placeholder: "Pilih Post",
        ajax: { 
          url: "{{route('list_post')}}",
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