<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <!-- Bootstrap-Iconpicker -->
    <link rel="stylesheet" href="{{ asset('assets/pakage/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}" type="style/css" />
    @stack('link')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('assets/images/title-image.png') }}" type="image/x-icon"
        style="width: 2px">
    <title>Pemenasan Hotel</title>
    @stack('css')
    <style>
        .btn-iconpicker, .btn-previous, .btn-next, .btn-icon, .navbar-bg {
            background-color: #30336b;
        }

        .breadcrumb-item a,
        h4,
        .main-sidebar .sidebar-menu li.active a {
            color: #130f40 !important;
        }
        .logout:focus{
            background-color: #30336b !important;
            color:white !important;
        }

    </style>
</head>

<body>
    <div id="app">
        <div class="navbar-bg"></div>
        <div class="main-wrapper main-wrapper-1">

            @include('template.partial.navbar')

            @include('template.partial.sidebar')


            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('judul')</h1>
                        <div class="section-header-breadcrumb mr-5" aria-label="breadcrumb">
                            @yield('breadcrump')
                        </div>
                    </div>
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"
            integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script  src={{ asset('template/assets/js/stisla.js') }}"></script>
            <script src="{{asset('assets/pakage/bootstrap-iconpicker/js/bootstrap-iconpicker.bundle.min.js')}}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="{{asset('assets/pakage/bootstrap-iconpicker/js/bootstrap-iconpicker-iconset-all.js')}}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->


        {{-- Data table --}}
        <script src="{{ asset('template/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- Template JS File -->
        <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
        <script src="{{ asset('template/assets/js/custom.js') }}"></script>
        
        <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

        {{-- moment js --}}
        <script src="{{ asset('assets/js/lib/moment.js') }}"></script>
        @stack('js')

</body>

</html>
