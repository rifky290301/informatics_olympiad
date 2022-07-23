<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title') | Informatics Olympiad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Informatics Olympiad">
    <meta name="author" content="Fauzan Amir Al Ghiffary">
    <link rel="stylesheet" href="//rsms.me/inter/inter.css">
    <script src="{{asset('superadmin/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('io/css/bootstrap/bootstrap.min.css')}}">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="{{asset('io/css/simplyCountdown.theme.losange.css')}}"/>
    <link rel="stylesheet" href="{{asset('io/css/simplyCountdown.theme.default.css')}}"/>
    @yield('style')
  </head>
  <body>
    <div class="">
      <section class="pb-8 pb-lg-20">
        <nav class="navbar navbar-light navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand h4 text-decoration-none" href="#">
              <img src="{{asset('io/img/logo.png')}}" alt="" style="height: 48px;" width="auto">
            </a>
            <div class="d-lg-none">
              <button class="btn btn-sm navbar-burger">
                <svg class="d-block" width="16" height="16" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>Mobile menu</title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
              </button>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav ms-auto me-4">
                <li class="nav-item"><a class="nav-link" href="{{route('landing')}}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('about')}}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('post')}}">Artikel</a></li>
              </ul>
              <div class="d-none d-lg-block"><a class="btn btn-secondary text-danger" href="{{route('login')}}">Sign In</a></div>
            </div>
          </div>
        </nav>
        @yield('header')
        <div class="d-none navbar-menu position-relative" style="z-index: 99">
          <div class="navbar-backdrop position-fixed top-0 start-0 end-0 bottom-0 bg-dark" style="opacity: 75%;"></div>
          <nav class="position-fixed top-0 start-0 bottom-0 d-flex flex-column w-75 max-w-sm py-6 px-6 bg-white overflow-auto">
            <div class="d-flex align-items-center mb-10">
              <a class="me-auto h4 mb-0 text-decoration-none" href="#">
                <img src="{{asset('io/img/logo.png')}}" alt="" style="height: 48px;" width="auto">
              </a>
              <button class="navbar-close btn-close" type="button" aria-label="Close"></button>
            </div>
            <div>
              <ul class="nav flex-column">
                <li class="nav-item mb-4"><a class="nav-link" href="{{route('landing')}}">Beranda</a></li>
                <li class="nav-item mb-4"><a class="nav-link" href="{{route('about')}}">Tentang</a></li>
                <li class="nav-item mb-4"><a class="nav-link" href="{{route('post')}}">Artikel</a></li>
              </ul>
            </div>
            <div class="mt-auto">
              <div class="py-6"><a class="w-100 btn btn-primary" href="#">Sign In</a></div>
              <p class="mb-4 small text-center text-muted">
                <span>&copy; 2021 All rights reserved.</span>
              </p>
            </div>
          </nav>
        </div>
      </section>
    
      @yield('content')

      <section class="py-10 py-lg-20">
        <div class="container">
          <div class="mb-8 pb-20 border-bottom">
            <div class="text-center">
              <a class="d-inline-block mb-8 h4 text-decoration-none" href="#">
                <img src="{{asset('io/img/logo.png')}}" alt="" style="height: 48px" width="auto">
              </a>
              <ul class="mb-8 d-flex flex-wrap gap-4 align-items-center justify-content-center list-unstyled" style="font-size: 14px;">
                <li class="mb-2 mb-md-0"><a class="text-decoration-none link-dark fw-bold" href="{{route('landing')}}">Home</a></li>
                <li class="mb-2 mb-md-0"><a class="text-decoration-none link-dark fw-bold" href="{{route('about')}}">About</a></li>
                <li class="mb-2 mb-md-0"><a class="text-decoration-none link-dark fw-bold" href="{{route('post')}}">Article</a></li>
              </ul>
              <div class="d-flex justify-content-center">
                <a class="d-flex justify-content-center align-items-center me-4 bg-light rounded-circle" href="https://instagram.com/if.olympiad" style="width: 40px; height: 40px;">
                  <svg class="text-muted" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.06713 0.454529H9.9328C11.9249 0.454529 13.5456 2.07519 13.5455 4.06715V9.93282C13.5455 11.9248 11.9249 13.5454 9.9328 13.5454H4.06713C2.07518 13.5454 0.45459 11.9249 0.45459 9.93282V4.06715C0.45459 2.07519 2.07518 0.454529 4.06713 0.454529ZM9.9329 12.3839C11.2845 12.3839 12.3841 11.2844 12.3841 9.93282H12.384V4.06714C12.384 2.71563 11.2844 1.61601 9.93282 1.61601H4.06715C2.71564 1.61601 1.61609 2.71563 1.61609 4.06714V9.93282C1.61609 11.2844 2.71564 12.384 4.06715 12.3839H9.9329ZM3.57148 7.00005C3.57148 5.10947 5.10951 3.5714 7.00005 3.5714C8.8906 3.5714 10.4286 5.10947 10.4286 7.00005C10.4286 8.89056 8.8906 10.4285 7.00005 10.4285C5.10951 10.4285 3.57148 8.89056 3.57148 7.00005ZM4.75203 6.99998C4.75203 8.23951 5.76054 9.24788 7.00004 9.24788C8.23955 9.24788 9.24806 8.23951 9.24806 6.99998C9.24806 5.76036 8.23963 4.75191 7.00004 4.75191C5.76046 4.75191 4.75203 5.76036 4.75203 6.99998Z" fill="currentColor"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <p class="text-center text-muted small"><a href="https://hmifunej.id/"> HMIF UNEJ </a> © All rights reserved</p>
        </div>
      </section>
    </div>
    <script src="{{asset('io/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('io/js/main.js')}}"></script>
    <script src="{{asset('io/js/simplyCountdown.js')}}"></script>
    @yield('script')
  </body>
</html>