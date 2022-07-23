@extends('layouts.frontend')
@section('title',$detail->judul)
@section('content')
<section class="position-relative py-10">
    <div class="container mb-8">
      <div class="max-w-2xl mx-auto text-center">
        <h2 class="mt-8 mb-10">{{$detail->judul}}</h2>
        <div class="row justify-content-center">
          <div class="col-auto text-start">
            <h4 class="mb-2">{{$detail->user->name}}</h4>
            <p class="text-muted">{{\Carbon\Carbon::parse($detail->created_at)->format('d M Y')}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="h-lg-50">
      <img class="img-fluid w-100 h-100" style="object-fit: cover; object-position: top;" src="{{asset('uploads/'.$detail->thumbnail)}}" alt="">
    </div>
</section>
<section class="py-20">
    <div class="container">
      <div class="max-w-2xl mx-auto">
        <p class="mb-8 lead text-muted">{!!$detail->content!!}</p>
      </div>
      <div>
        <h4 class="mb-3">Lampiran</h4>
        @forelse ($detail->unduhan as $item)
          @if ($item->type == 0)
            <a class="btn btn-primary" href="{{asset('uploads/'.$item->berkas)}}">{{$item->judul}}</a>
          @else
            <a class="btn btn-primary" href="{{$item->url}}">{{$item->judul}}</a>
          @endif
        @empty
          <h5 class="mb-3">Tidak Ada Lampiran</h5>
        @endforelse
    </div>
    </div>
</section>
@endsection