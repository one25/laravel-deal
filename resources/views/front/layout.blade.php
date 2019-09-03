<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles CSS -->
    <!-- bootstrap css -->    
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- awesome css -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- datepicker -->
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">    
    <link type="text/css" href="{{ asset('public/AdminLTE/js/jquery-ui-1.9.2.custom/development-bundle/themes/base/jquery.ui.datepicker.css') }}" rel="stylesheet" />
    <!-- my brick.css -->
    <!-- <link rel="stylesheet" href="{{ asset('public/css/brick.css') }}"> --> 
    <!-- my mine.css -->
    <link rel="stylesheet" href="{{ asset('public/css/mine.css') }}">

    @yield('css')

</head>
<body>
    <div class="wrapper">
        <div class="content-wrapper margin">
            @yield('main')
        </div>
    </div>
<!-- Scripts JS -->   
<!-- bootstrap script -->
<script src="{{ asset('public/js/app.js') }}"></script>
<!-- jquery scripts -->
<script src="{{ asset('public/js/jQuery-2.2.0.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>  
<!-- datepicker -->
<script type="text/javascript" src="{{ asset('public/AdminLTE/js/jquery-ui-1.9.2.custom/development-bundle/ui/i18n/jquery.ui.datepicker-en.js') }}"></script>
<!-- Sweet Alert script -->
<script src="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.js"></script>

@yield('js')

</body>
</html>
