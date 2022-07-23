@extends('layouts.peserta')
@section('title','Berkas')
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
                    @if (auth()->user()->profile->lolos == 1)
                                <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                                    <div class="alert-text">Selamat, kamu telah lolos seleksi administrasi, maksimalkan dan tunggu babak penyisihan ya!</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                    @endif
                    @if (auth()->user()->profile->lolos == 0)
                                <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                    <div class="alert-text">Mohon maaf, kamu belum lolos seleksi administrasi!</div>
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
                        <div class="alert-text">Maaf, lengkapi berkas dahulu!</div>
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

                    @foreach ($berkas as $item)
                    
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">{{$item->nama_berkas}}
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                
                                <div class="flex flex-col text-left w-full mt-10">
                                    <ul>
                                        <li>Format : {{$item->jenis}}</li>
                                        @if (!empty($item->format))
                                        <li>Ekstensi yang diterima : {{$item->format}}</li>
                                        @endif
                                        <li>Max : {{$item->size}} KB</li>
                                        @if (!empty($item->petunjuk))
                                        <li>Petunjuk : {{$item->petunjuk}}</li>
                                        @endif
                                        <li>Status : <span style="color: red"> @if ($item->mandatory == 1) Wajib Diisi @else Opsional @endif</span></li>
                                       
                                        
                                    </ul>
                                    @if (!berkas($item->id,auth()->user()->profile->id))
                                    <form action="{{route('berkas.store')}}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <input type="hidden" name="berkas_id" value="{{$item->id}}">
                                        <div class="flex flex-row mt-5 ">
                                            <div class="relative">
                                                <input
                                                        id="berkas"
                                                        name="berkas"
                                                        type="file"
                                                        accept="application/{{$item->format}}"
                                                        class="text-sm sm:text-base relative w-100 border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-6">
                                    
                                            </div>
                                        </div>
                                        <div class="flex flex-row mt-5 ">
                                            <button type="submit" class="btn btn-primary font-weight-bold">Unggah</button>
                                    </div>
                                    </form>
                                    @endif
                                    
                                    <p class="mt-5"> Status Berkas </p>
                                    <div class="flex flex-wrap">
                                        @if (berkas($item->id,auth()->user()->profile->id))
                                        @foreach ($item->unggahan as $items)
                                            <a href="{{asset('uploads/'.$items->berkas)}}" class="btn btn-success font-weight-bold">Lihat Unggahan</a>
                                            @if (auth()->user()->profile->lolos == 2)
                                                <a href="{{route('hapus.berkas', $items->id)}}" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="btn btn-warning font-weight-bold">Hapus Unggahan</a>
                                            @endif
                                        @endforeach
                                        @else
                                            <button type="button" class="btn btn-danger font-weight-bold">Belum mengunggah</button>
                                        @endif
                                        
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    @endforeach
                    
                    
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection