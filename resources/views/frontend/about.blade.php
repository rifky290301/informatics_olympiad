@extends('layouts.frontend')
@section('title','Tentang')
@section('content')
<section class="py-20 overflow-hidden">
    <div class="container">
      <div class="row mb-12 mb-lg-20">
        <div class="col-12 col-lg-6 mb-10 mb-lg-0">
          <span class="small text-info fw-bold">Apa itu</span>
          <h2 class="mt-8 mb-10">Informatics Olympiad</h2>
          <p class="lead text-muted">Informatics Olympiad merupakan sebuah kompetisi olimpiade pada bidang informatika yang diselenggarakan oleh Himpunan Mahasiswa Informatika Universitas Jember. IO diselenggarakan secara daring, berbasis CBT dan standar olimpiade</p>
        </div>
        <div class="position-relative col-12 col-lg-6">
          <img class="position-relative img-fluid rounded" style="object-fit: cover;" src="{{asset('io/img/logo.png')}}" alt="">
        </div>
      </div>
    </div>
</section>
@endsection