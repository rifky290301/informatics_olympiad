<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Informatics Olympiad</title>
    <meta name="description" content="@yield('description')" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    @yield('style')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url({{asset('assets/media/bg/bg-10.jpg')}})" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile">
        <!--begin::Logo-->
        <a href="index.html">
            <img alt="Logo" src="{{asset('io/img/logo.png')}}" class="logo-default max-h-30px" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container d-flex align-items-stretch justify-content-between">
                        <!--begin::Left-->
                        <div class="d-flex align-items-stretch mr-3">
                            <!--begin::Header Logo-->
                            <div class="header-logo">
                                <a href="#">
                                    <img alt="Logo" src="{{asset('io/img/logo.png')}}" class="logo-default max-h-40px" />
                                    <img alt="Logo" src="{{asset('io/img/logo.png')}}" class="logo-sticky max-h-40px" />
                                </a>
                            </div>
                            <!--begin::Header Menu Wrapper-->
								<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
									<!--begin::Header Menu-->
									<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
										<!--begin::Header Nav-->
										<ul class="menu-nav">
                                            <li class="menu-item">
												<a href="{{route('admin')}}" class="menu-link">
													<span class="menu-text">Dasbor</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
                                            
										</ul>
										<!--end::Header Nav-->
									</div>
									<!--end::Header Menu-->
								</div>
								<!--end::Header Menu Wrapper-->
                            <!--end::Header Logo-->
                        </div>
                        <!--end::Left-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                @yield('content')
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">@php echo date('Y') @endphp ©</span>
                            <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Pusat Prestasi Nasional</a>
                        </div>
                        <!--end::Copyright-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#6993FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1E9FF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/jquery-mask.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Global Theme Bundle-->
    <script>
        $('.rt_rw').mask('000/000', {
            placeholder: "000/000"
        });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
        });
    });
    </script>
    @yield('script')
</body>
<!--end::Body-->

</html>