<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Analytics Dashboard | Mantis Bootstrap 5 Admin Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('adm/dist/assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('adm/dist/assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('adm/dist/assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('adm/dist/assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('adm/dist/assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('adm/dist/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('adm/dist/assets/css/style-preset.css') }}">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    {{-- <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div> --}}
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    @include('admin.partials.sidebar')
    <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
    @include('admin.partials.header')
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    {{-- Always show Home / Dashboard --}}
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>

                    @php
                        $routeName = Route::currentRouteName(); // contoh: "admin.village-profile.index"
                        $segments = explode('.', $routeName);
                        // Hasil: ['admin', 'village-profile', 'index']
                    @endphp

                    {{-- Resource name --}}
                    @if (isset($segments[1]) && $segments[1] !== 'dashboard')
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.' . $segments[1] . '.index') }}">
                                {{ Str::title(str_replace('-', ' ', $segments[1])) }}
                            </a>
                        </li>
                    @endif

                    {{-- Action --}}
                    @if (isset($segments[2]) && $segments[2] !== 'index')
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ Str::title(str_replace('-', ' ', $segments[2])) }}
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">
                        @if (isset($segments[1]) && $segments[1] !== 'dashboard')
                            {{ Str::title(str_replace('-', ' ', $segments[1])) }}
                        @else
                            Dashboard
                        @endif

                        @if (isset($segments[2]) && $segments[2] !== 'index')
                            - {{ Str::title(str_replace('-', ' ', $segments[2])) }}
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            @yield('content')

            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    @include('admin.partials.footer')


    <script src="{{ asset('adm/dist/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('adm/dist/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('adm/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adm/dist/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('adm/dist/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('adm/dist/assets/js/plugins/feather.min.js') }}"></script>





    <script>
        layout_change('light');
    </script>




    <script>
        change_box_container('false');
    </script>



    <script>
        layout_rtl_change('false');
    </script>


    <script>
        preset_change("preset-1");
    </script>


    <script>
        font_change("Public-Sans");
    </script>



    <!-- [Page Specific JS] start -->
    <!-- Apex Chart -->
    <script src="{{ asset('adm/dist/assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('adm/dist/assets/js/pages/dashboard-analytics.js') }}"></script>
    <!-- [Page Specific JS] end -->
</body>
<!-- [Body] end -->

</html>
