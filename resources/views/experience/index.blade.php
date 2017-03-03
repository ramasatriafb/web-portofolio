@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')
<div id="page-wrapper" style="min-height: 600px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Experience</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Experience CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('experience.create') }}"> Create New Experience</a>
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
            <th>Profesi</th>
            <th>Tahun</th>
            <th>Perusahaan</th>
            <th>Deskripsi</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($experiences as $key => $experience)

    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $experience->profesi }}</td>
        <td>{{ $experience->tahun }}</td>
        <td>{{ $experience->perusahaan }}</td>
        <td>{{ $experience->deskripsi }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('experience.show',$experience->id) }}"><i class="fa fa-eye"></i></a>
            <a class="btn btn-primary" href="{{ route('experience.edit',$experience->id) }}"><i class="fa fa-edit"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['experience.destroy', $experience->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $experiences->render() !!}

@endsection