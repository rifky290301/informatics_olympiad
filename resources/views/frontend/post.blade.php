@extends('layouts.frontend')
@section('title','Post')
@section('content')
<section class="position-relative overflow-hidden py-20">
    <img class="d-none d-lg-block position-absolute top-0 start-0 mt-20" src="{{asset('io/zeus-assets/icons/dots/blue-dot-left-bars.svg')}}" alt="">
    <img class="d-none d-lg-block position-absolute top-0 end-0 mt-52" src="{{asset('io/zeus-assets/icons/dots/yellow-dot-right-shield.svg')}}" alt="">
    <div class="container">
      <div class="max-w-2xl mx-auto mb-20 text-center">
        <span class="small text-info fw-bold">Informatics Olympiad</span>
        <h2 class="mt-8 mb-10">Artikel</h2>
        <p class="lead text-muted">Temukan informasi dari kami</p>
      </div>
      <div class="row" id="table_data">
        @include('frontend.post_ajax')
      </div>
    </div>
</section>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $(document).on('click', '.pagination a', function(event){
      event.preventDefault(); 
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
    });   

    function fetch_data(page)
      {
        var url = '{{ route("load_post") }}?page='+page;
        $.ajax({
          url: url,
          success:function(data)
          {
            $('#table_data').html(data);
          }
      });
    }
    
  });
</script>
@endsection