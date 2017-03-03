@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')
<div id="page-wrapper" style="min-height: 600px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">My Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Profile CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('profile.create') }}"> Create New Profile</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Profile Name</th>
            <th>Job Title</th>
           
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($profiles as $key => $profile)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $profile->name }}</td>
        <td>{{ $profile->job_title }}</td>
        <td>{{ $profile->email_address }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('profile.show',$profile->id) }}"><i class="fa fa-eye"></i></a>
            <a class="btn btn-primary" href="{{ route('profile.edit',$profile->id) }}"><i class="fa fa-edit"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['profile.destroy', $profile->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

@endsection