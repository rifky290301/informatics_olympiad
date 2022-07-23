@extends('layouts.admin')
@section('title','Unduhan')
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
                    
                                <a href="{{route('lampiran.create')}}" class="btn btn-primary font-weight-bolder">Tambah @yield('title')</a>
                                
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Post</th>
                                        <th>File</th>
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
       url: "{{ route('lampiran.index') }}",
      },
      columns:[

       {
        data: 'judul',
        name: 'judul',
       },
       {
        data: 'post.judul',
        name: 'post.judul',
       },
       {
        data: 'file',
        name: 'file',
        orderable: false,
        searchable: false,
       },
       {
        data: 'edit',
        name: 'edit',
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