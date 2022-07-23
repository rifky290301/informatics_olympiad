@extends('layouts.admin')
@section('title','Dashboard')
@section('description','Dashboard')
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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Selamat Datang {{Auth::user()->name}}</h2>
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
                            <h3 class="card-title">Dashboard</h3>
                            <div class="card-toolbar">
                    
                                <!--begin::Button-->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="btn btn-danger font-weight-bolder">
                                        Keluar</a>
                                </form>
                                
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <ul class="dashboard-tabs nav nav-pills nav-primary row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                                <!--begin::Item-->
                                <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="{{route('seleksi.index')}}">
                                        <span class="nav-icon py-2 w-auto">
                                            <span class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Home\Bulb1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="9" r="8"/>
                                                    <path d="M14.5297296,11 L9.46184488,11 L11.9758349,17.4645458 L14.5297296,11 Z M10.5679953,19.3624463 L6.53815512,9 L17.4702704,9 L13.3744964,19.3674279 L11.9759405,18.814912 L10.5679953,19.3624463 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M10,22 L14,22 L14,22 C14,23.1045695 13.1045695,24 12,24 L12,24 C10.8954305,24 10,23.1045695 10,22 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 L15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 C15.5522847,20 16,20.4477153 16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 C8,20.4477153 8.44771525,20 9,20 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Seleksi Administrasi</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="{{route('informasi')}}">
                                        <span class="nav-icon py-2 w-auto">
                                            <span class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Home\Bulb1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="9" r="8"/>
                                                    <path d="M14.5297296,11 L9.46184488,11 L11.9758349,17.4645458 L14.5297296,11 Z M10.5679953,19.3624463 L6.53815512,9 L17.4702704,9 L13.3744964,19.3674279 L11.9759405,18.814912 L10.5679953,19.3624463 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M10,22 L14,22 L14,22 C14,23.1045695 13.1045695,24 12,24 L12,24 C10.8954305,24 10,23.1045695 10,22 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 L15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 C15.5522847,20 16,20.4477153 16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 C8,20.4477153 8.44771525,20 9,20 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Informasi</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                
                            </ul>
                        </div>
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