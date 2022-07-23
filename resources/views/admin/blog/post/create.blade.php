@extends('layouts.admin')
@section('title','Tambah Post')
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
                            <h3 class="card-title">Tambah Post</h3>
                        </div>
                        <!--begin::Form-->
                        <form action="{{route('post.store')}}" enctype="multipart/form-data" method="POST">
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
                                        <label>Kategori <span class="text-danger">*</span></label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($category as $item)
                                                <option value="{{$item->id}}">{{$item->nama_bidang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thumbnail <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="thumbnail"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Konten <span class="text-danger">*</span></label>
                                        <textarea name="content" class="summernote form-control"></textarea>
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