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
                <h2> Show Skill</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('skill.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">

       

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Skill:</strong>
                {{ $skills->skills }}
            </div>
        </div>

    </div>

@endsection