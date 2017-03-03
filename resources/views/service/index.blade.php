@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')
<div id="page-wrapper" style="min-height: 600px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Service</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Services CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('service.create') }}"> Create New Services</a>
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
            <th>Service</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($services as $key => $service)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $service->services }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('service.show',$service->id) }}"><i class="fa fa-eye"></i></a>
            <a class="btn btn-primary" href="{{ route('service.edit',$service->id) }}"><i class="fa fa-edit"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['service.destroy', $service->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $services->render() !!}

@endsection