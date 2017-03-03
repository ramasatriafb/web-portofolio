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

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                            @endforeach
                        </div>
                        @endif
                        <form role="form" action="{{ route('user.signup')}}" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                {{ csrf_field() }}
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <
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