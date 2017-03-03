@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')
<div id="page-wrapper" style="min-height: 600px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Your Message</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Your Message</h2>
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
            <th>Name</th>
            <th>Message</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($contacts as $key => $contact)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->message }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('contact.show',$contact->id) }}"><i class="fa fa-eye"></i></a>
             {!! Form::open(['method' => 'DELETE','route' => ['contact.destroy', $contact->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
  {!! $contacts->render() !!}
@endsection