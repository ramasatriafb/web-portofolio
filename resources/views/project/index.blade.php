@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')
<div id="page-wrapper" style="min-height: 600px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Project</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Project CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('project.create') }}"> Create New Project</a>
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
            <th>Project Name</th>
            <th>Project Image</th>
            <th>Link of Project</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($projects as $key => $project)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $project->name }}</td>
        <td><img src="{{ asset($project->image)}}" alt=" " class="img-responsive"></td>
        <td>{{ $project->link }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('project.show',$project->id) }}"><i class="fa fa-eye"></i></a>
            <a class="btn btn-primary" href="{{ route('project.edit',$project->id) }}"><i class="fa fa-edit"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['project.destroy', $project->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $projects->render() !!}

@endsection