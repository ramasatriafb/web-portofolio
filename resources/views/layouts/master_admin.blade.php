<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::to('admin/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('admin/dist/css/sb-admin-2.cs') }}s" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::to('admin/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('styles')
</head>
@include('partials.header_admin')
<div class="wrapper">
    @yield('content')
</div>

<script src="{{ URL::to('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('admin/vendor/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ URL::to('admin/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ URL::to('admin/vendor/morrisjs/morris.min.js') }}"></script>
<script src="{{ URL::to('admin/data/morris-data.js') }}"></script>
<script src="{{ URL::to('admin/dist/js/sb-admin-2.js') }}"></script>
@yield('scripts')
</body>
</html>