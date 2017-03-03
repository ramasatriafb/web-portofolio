@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')
<div id="page-wrapper" style="min-height: 600px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Education</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
            <!-- /.row -->
          <div class="row">
           <div class="pull-right">
                <a class="btn btn-success" href="{{ route('education.create') }}"> Create New Education</a>
            </div>

            <div class="col-lg-12">
             @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                        <p>{{ $message }}</p>
                     </div>
             @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Education
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Institusi</th>
                                            <th>Gelar</th>
                                            <th>Tahun</th>
                                            <th>Deskripsi</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($educations as $key => $education)
                                    <tbody>
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $education->institusi }}</td>
                                            <td>{{ $education->gelar }}</td>
                                            <td>{{ $education->tahun }}</td>
                                            <td>{{ $education->deskripsi }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('education.show',$education->id) }}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-primary" href="{{ route('education.edit',$education->id) }}"><i class="fa fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['education.destroy', $education->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                     @endforeach
                                </table>
                                {!! $educations->render() !!}

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
        </div>
</div>
@endsection