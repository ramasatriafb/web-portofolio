@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')
<div id="page-wrapper" style="min-height: 600px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Skill</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Service</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('service.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'service.store','method'=>'POST')) !!}
    <div class="row">

       

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Services:</strong>
                {!! Form::textarea('services', null, array('placeholder' => 'Services','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}


@endsection