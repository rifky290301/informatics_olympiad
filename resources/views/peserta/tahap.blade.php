@extends('layouts.peserta')
@section('title','Ujian')
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
                            <h3 class="card-title">@yield('title')
                            </h3>
                            <div class="card-toolbar">
                                <a type="button" class="btn btn-primary" href="{{asset('materi.pdf')}}">Unduh Materi</a>
                                <a type="button" class="btn btn-primary ml-3" href="{{asset('soal.pdf')}}">Unduh Contoh Materi</a>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="example">
                                <thead>
                                    <tr>
                                        <th>Tahap</th>
                                        <th>Status</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                            <!--end: Datatable-->
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
@section('script')
<script>
$(document).ready(function(){
      var id = $(this).attr('id');
     $('#example').DataTable({
      processing: true,
      stateSave: true,
      serverSide: true,
      responsive: true,
      ajax:{
       url: "{{ route('tahap.index') }}",
      },
      columns:[
       {
        data: 'tahap',
        name: 'tahap',
        orderable: false,
        searchable: false,
       },
       
       {
        data: 'statuss',
        name: 'statuss',
        orderable: false,
        searchable: false,
       },
       {
        data: 'batas',
        name: 'batas',
        orderable: false,
        searchable: false,
       },
       {
        data: 'unggah',
        name: 'unggah',
        orderable: false,
        searchable: false,
       }
       
      ]
     })
    .columns.adjust()
	.responsive.recalc();
    });
</script>

@endsection