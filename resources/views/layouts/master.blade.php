<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('main.js') }}"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  @include('layouts.header')
    <div class="content-wrapper">
       @hasSection('containerHeader')
           @yield('containerHeader')
        @else
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"><ol class="breadcrumb float-sm-right"></ol></div>
                    </div>
                </div>
            </div>
       @endif
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Generated By <a target="_blank" href="https://github.com/Cuialy">Cuialy Software</a>
        </div>
        <strong>Copyright &copy; {{ date('Y') }} | </strong> <a target="_blank" href="https://github.com/Cuialy/qr-url-access">This Project Is Open Source</a>
    </footer>
</div>
@if (session()->has('alert'))
    <script>
        swal(
            "{{ session('alert.title') }}",
            "{{ session('alert.text') }}",
            "{{ session('alert.type') }}"
        );
    </script>
@endif
@if ($errors->any())
    <script>
        swal("Error!", "{{ $errors->first() }}", "error");
    </script>
@endif
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ route('cuaily-js') }}"></script>
@stack('js')
</body>
</html>