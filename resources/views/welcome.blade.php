@extends('layouts.frontend')
@section('title','Home')
@section('header')
<div class="container mt-8">
    <div class="row align-items-center">
      <div class="col-12 col-lg-6 mb-5 mb-lg-0">
        <span class="text-info fw-bold">Informatics Olympiad</span>
        <h1 class="mt-8 mb-8 mb-lg-12">Conquer The Game!</h1>
        <div class="d-flex flex-wrap mb-10"><a class="btn btn-primary me-4" href="{{route('register')}}">Daftar Sekarang</a><a class="btn btn-outline-dark" href="{{route('login')}}">Masuk</a></div>
      </div>
      <div class="col-12 col-lg-6 position-relative">
        <img class="position-relative img-fluid" src="{{asset('io/img/logo.png')}}" alt="">
      </div>
    </div>
</div>
@endsection
@section('content')
<section class="position-relative py-20 overflow-hidden">
    <div class="d-none d-lg-block position-absolute bottom-0 start-0">
      <img class="position-absolute start-0 bottom-0 d-block ms-80" style="width: 18rem;" src="{{asset('io/zeus-assets/images/backgrounds/blue-triangle.svg')}}" alt="">
      <img class="d-block ms-64 mt-64" src="{{asset('io/zeus-assets/images/backgrounds/pink-circle.svg')}}" alt="">
      <img class="d-block" src="{{asset('io/zeus-assets/images/backgrounds/yellow-eclipse.svg')}}" alt="">
    </div>
    <div class="position-relative container">
      <div class="row gap-12 align-items-center">
        <div class="col-12 col-lg-6">
          <img class="img-fluid rounded" src="{{asset('io/zeus-assets/images/group-posts.png')}}" alt="">
        </div>
        <div class="col-12 col-lg-5">
          <span class="small text-info fw-bold">Informatics Olympiad</span>
          <h2 class="mt-8 mb-6 mb-lg-12">Perkuat kemampuan logikamu melalui Informatics Olympiad</h2>
          <p class="mb-6 mb-lg-12 lead text-muted">Informatics Olympiad atau I/O adalah ajang kompetisi tahunan yang diselenggarakan oleh Himpunan Mahasiswa Informatika (HMIF) Fakultas Ilmu Komputer Universitas Jember. Olimpiade Komputer Tingkat Nasional ini diperuntukan bagi siswa SMA/SMK/Sederajat dan untuk tahun 2021 akan dilaksanakan secara daring (Online).</p>
          <a class="btn btn-primary" href="{{route('register')}}">Daftar</a>
        </div>
      </div>
    </div>
  </section>

  <section class="position-relative overflow-hidden py-20">
    <img class="d-none d-lg-block position-absolute top-0 start-0 mt-20" src="{{asset('io/zeus-assets/icons/dots/blue-dot-left-bars.svg')}}" alt="">
    <img class="d-none d-lg-block position-absolute top-0 end-0 mt-52" src="{{asset('io/zeus-assets/icons/dots/yellow-dot-right-shield.svg')}}" alt="">
    <div class="container">
      <div class="max-w-2xl mx-auto mb-20 text-center">
        <span class="small text-info fw-bold">Informatics Olympiad</span>
        <h2 class="mt-8 mb-10">Artikel</h2>
        <p class="lead text-muted">Temukan informasi dari kami</p>
      </div>
      <div class="row">
          @foreach ($post as $item)
            @if ($loop->index == 0)
            <div class="col-12 col-lg-8 mb-16">
                <div class="mb-10">
                  <img class="img-fluid w-100 rounded" style="height:400px; object-fit: cover;" src="{{asset('uploads/'.$item->thumbnail)}}" alt="">
                </div>
                <span class="d-inline-block px-2 py-1 small bg-info rounded uppercase text-white">{{$item->category->nama_bidang}}</span>
                
                <h2 class="h3 mb-4">{{$item->judul}}</h2>
                <span class="d-inline-block mb-4 small text-muted">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</span>
                <p class="mb-4 lead text-muted">{{Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->content)), 100, ' [....]')}}</p>
                <a class="h6" href="{{route('detail_post', [$item->category->slug,$item->slug])}}">Read more</a>
            </div>
            @else
            <div class="col-12 col-lg-4 mb-16">
                <div class="mb-10">
                  <img class="img-fluid w-100 rounded" style="height:400px; object-fit: cover;" src="{{asset('uploads/'.$item->thumbnail)}}" alt="">
                </div>
                <span class="d-inline-block px-2 py-1 small bg-info rounded uppercase text-white">{{$item->category->nama_bidang}}</span>
                <h2 class="h3 mb-4">{{$item->judul}}</h2>
                <span class="d-inline-block mb-4 small text-muted">{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</span>
                <p class="mb-4 lead text-muted">{{Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->content)), 100, ' [....]')}}</p>
                <a class="h6" href="{{route('detail_post', [$item->category->slug,$item->slug])}}">Read more</a>
            </div>
            @endif
          @endforeach
      </div>
    </div>
  </section>


  <section class="py-20">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6 mb-12 mb-lg-0">
          <span class="small text-info fw-bold">Informatics Olympiad</span>
          <h2 class="mt-8 mb-10">Timeline I/O 2021</h2>
          <p class="mb-12 lead text-muted">Perhatikan timeline kegiatan Informatics Olympiad 2021</p>
        </div>
        <div class="col-12 col-lg-6">
          <div class="bg-light rounded px-5 px-lg-10">
            <div class="py-8 border-bottom">
              <div class="d-flex align-items-start">
                <span class="me-6 flex-shrink-0 d-flex justify-content-center align-items-center rounded-circle bg-info text-white" style="width: 48px; height: 48px;">1</span>
                <div>
                  <strong>Pendaftaran</strong>
                  <ul>
                    <li>Gelombang 1: 1 Agustus 2021 – 30 September 2021</li>
                    <li>Gelombang 2: 1 Oktober 2021 – 17 Oktober 2021</li>
                  </ul>
                  <p class="text-muted">Pendaftaran peserta Informatics Olympiad 2021 bisa dilakukan secara online melalui website</p>
                </div>
              </div>
            </div>
            <div class="py-8 border-bottom">
              <div class="d-flex align-items-start">
                <span class="me-6 flex-shrink-0 d-flex justify-content-center align-items-center rounded-circle bg-warning text-white" style="width: 48px; height: 48px;">2</span>
                <div>
                <strong>Penyisihan</strong>
                <p class="text-muted">Minggu, 24 Oktober 2021 <br>
                  Penyisihan akan dilaksanakan secara online melalui website dan zoom meeting sesuai dengan ketentuan teknis yang telah diberikan oleh panitia
                  </p>
              </div>
            </div>
            </div>
            <div class="py-8">
              <div class="d-flex align-items-start">
                <span class="me-6 flex-shrink-0 d-flex justify-content-center align-items-center rounded-circle bg-danger text-white" style="width: 48px; height: 48px;">3</span>
                <div>
                  <strong>Final</strong>
                  <p class="text-muted">Minggu, 7 November 2021 <br>
                    Final akan dilaksanakan secara online melalui website dan zoom meeting sesuai dengan ketentuan teknis yang telah diberikan oleh panitia.
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="position-relative py-20">
    <img class="d-none d-lg-block position-absolute top-0 start-0 mt-64" src="zeus-assets/icons/dots/blue-dot-left-bars.svg" alt="">
    <img class="d-none d-lg-block position-absolute top-0 end-0 mt-40" src="zeus-assets/icons/dots/yellow-dot-right-shield.svg" alt="">
    <div class="container">
      <div class="max-w-2xl mx-auto mb-20 text-center">
        <span class="small text-info fw-bold">I/O 2021</span>
        <h2 class="mt-8 mb-10">Penghargaan</h2>
        <p class="mb-16 lead text-muted">Rebut hadiah ini untukmu</p>
      </div>
      <div class="row align-items-center">
        <div class="col-12 col-lg-4 mb-6 mb-lg-0">
          <div class="pt-12 pb-8 px-8 bg-danger rounded text-lg-center">
            <h3 class="mb-6 h6 text-light">Juara</h3>
            <div class="d-flex justify-content-lg-center mb-4">
              <p class="align-self-end h1 text-white">1</p>
            </div>
            <ul class="mb-8 text-start list-unstyled">
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Rp 2.000.000,-</p>
              </li>
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Trophy</p>
              </li>
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Sertifikat</p>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="col-12 col-lg-4 mb-6 mb-lg-0">
          <div class="pt-12 pb-8 px-8 bg-danger rounded text-lg-center">
            <h3 class="mb-6 h6 text-light">Juara</h3>
            <div class="d-flex justify-content-lg-center mb-4">
              <p class="align-self-end h1 text-white">2</p>
            </div>
            <ul class="mb-8 text-start list-unstyled">
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Rp 1.500.000,-</p>
              </li>
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Trophy</p>
              </li>
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Sertifikat</p>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-12 col-lg-4 mb-6 mb-lg-0">
          <div class="pt-12 pb-8 px-8 bg-danger rounded text-lg-center">
            <h3 class="mb-6 h6 text-light">Juara</h3>
            <div class="d-flex justify-content-lg-center mb-4">
              <p class="align-self-end h1 text-white">3</p>
            </div>
            <ul class="mb-8 text-start list-unstyled">
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Rp 1.250.000,-</p>
              </li>
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Trophy</p>
              </li>
              <li class="d-flex align-items-center py-4 border-bottom border-light">
                <svg class="me-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z" fill="#ffffff"></path>
                </svg>
                <p class="mb-0 fw-bold text-white">Sertifikat</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="position-relative py-20">
    <div class="container">
      <div class="row gap-12 align-items-center">
        <div class="col-12 col-lg-5">
          <span class="small text-info fw-bold">Waktu Mundur</span>
          <h2 class="mt-8 mb-6 mb-lg-12 simply-countdown-inline"></h2>
          <p class="mb-6 mb-lg-12 lead text-muted">Menuju Penutupan Pendaftaran Informatics Olympiad</p>
          <a class="btn btn-primary" href="{{route('register')}}">Daftar Sekarang</a>
        </div>
        <div class="position-relative col-12 col-lg-6">
          <img class="img-fluid rounded" style="height: 512px; object-fit: cover;" src="https://images.unsplash.com/photo-1524508762098-fd966ffb6ef9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1050&amp;q=80" alt="">
        </div>
      </div>
    </div>
    <img class="d-none d-lg-block position-absolute top-0 end-0 mt-52" src="{{asset('io/zeus-assets/icons/dots/yellow-dot-right-shield.svg')}}" alt="">
  </section>

  <section class="bg-dark py-20">
    <div class="container">
      <h2 class="mb-8 mb-lg-16 display-1 text-white">Ayo Ikuti Informatics Olympiad</h2>
      <div class="row">
        <div class="col col-lg-7 mb-3 mb-lg-0">
          <p class="lead text-muted mb-1">Asah kemampuan logikamu</p>
          <p class="lead text-muted">dan dapatkan hadiah menarik</p>
        </div>
        <div class="col-12 col-lg-auto ms-auto"><a class="btn btn-primary w-100 px-12 w-lg-auto" href="{{route('register')}}">Daftar</a></div>
      </div>
    </div>
  </section>
  <section class="position-relative overflow-hidden py-20">
    <img class="d-none d-lg-block position-absolute top-0 start-0 mt-2" src="zeus-assets/icons/dots/blue-dot-left-bars.svg" alt="">
    <img class="d-none d-lg-block position-absolute bottom-0 end-0 mb-10" src="zeus-assets/icons/dots/yellow-dot-right-shield.svg" alt="">
    <div class="position-relative container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6">
          <h4 class="mb-3">Joel Gunawan</h4>
          <p class="mb-12 text-muted">Juara 2 Informatics Olympiad 2020</p>
          <h3 class="mb-12 text-xl">"Informatics Olympiad memberi saya kesempatan untuk bisa berkompetisi dalam lingkungan yang jujur dan kualitas soal yang baik."</h3>
          {{-- <diva class="d-flex align-items-center">
            <button class="d-none d-lg-block me-2 rounded-circle border bg-white" style="width: 56px; height: 56px;">
              <svg class="mx-auto" width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.30024 6.25122L18.2502 6.25122" stroke="#838EA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.30029 1.25024L1.36329 6.25124L9.30029 11.2522L9.30029 1.25024Z" stroke="#838EA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
            <button class="d-none d-lg-block me-2 rounded-circle border bg-white" style="width: 56px; height: 56px;">
              <svg class="mx-auto" width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.69976 6.74878L0.749756 6.74878" stroke="#838EA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.69971 11.7498L17.6367 6.74876L9.69971 1.74776V11.7498Z" stroke="#838EA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
          </diva> --}}
        </div>
        <div class="position-relative col-12 col-lg-6">
          <div class="d-lg-none mb-lg-12">
            <button class="d-none d-lg-block me-6 rounded-circle border bg-white" style="width: 56px; height: 56px;">
              <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12L5 12" stroke="#556B7A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12 19L5 12L12 5" stroke="#556B7A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
            <button class="d-none d-lg-block me-6 rounded-circle border bg-white" style="width: 56px; height: 56px;">
              <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12L19 12" stroke="#556B7A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12 5L19 12L12 19" stroke="#556B7A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
          </div>
          <img class="position-relative w-100 mx-auto" style="object-fit: cover; height: 448px;" src="{{asset('juara2.jpeg')}}" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="py-20">
    <div class="container">
      <div class="max-w-2xl mx-auto mb-12 mb-lg-20 text-center">
        <span class="small text-info fw-bold">I/O 2021</span>
        <h2 class="mt-8 mb-10">Keep In Touch With Us</h2>
      </div>
      <div class="row mb-n6 mb-lg-0">
        <div class="col-12 col-lg-6 mb-6 mb-lg-0">
          <div class="py-12 h-100 border text-center rounded">
            <h3 class="mb-6 h4">Alamat</h3>
            <p class="text-muted">Fakultas Ilmu Komputer Universitas Jember
              </p>
            <p class="text-muted">Jl. Kalimantan no. 37 Kampus Tegal Boto,
              Jember 65538</p>
          </div>
        </div>
        <div class="col-12 col-lg-6 mb-6 mb-lg-0">
          <div class="py-12 h-100 border text-center rounded">
            <h3 class="mb-6 h4">Kontak</h3>
            <ul>
              <li>Windhi : 0857-2636-9601
                </li>
                <li>Shohibun : 0878-9677-3970</li>
            </ul>
            {{-- <p class="text-muted">hello@wireframes.org</p>
            <p class="text-muted">+7-843-672-431</p> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')
    <script>
      simplyCountdown('.simply-countdown-inline', {
        year: '{{$time->year}}',
        month: '{{$time->month}}',
        day: '{{$time->day}}',
        hours: '{{$time->hour}}',
        minutes: '{{$time->minute}}',
        seconds: '{{$time->second}}',
        inline: true
      });
    </script>
@endsection