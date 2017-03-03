@extends('layouts.master_admin')
@section('title')
Admin
@endsection
@section('content')

<div id="page-wrapper" style="min-height: 649px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $hariini }}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$count_message}}</div>
                                    <div>Message Today!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('contact.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$projects_count}}</div>
                                    <div>Your Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('project.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$count_message}}</div>
                                    <div>Your Social Media Click</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('contact.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Create Your Social Media
                        </div>
                        <div class="panel-body">
                        {!! Form::open(array('route' => 'medsos.store','method'=>'POST')) !!}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Choose a Icon:</strong>
                                {!! Form::select('icon_id',$icons, null, array('placeholder' => 'Icon','class' => 'form-control')) !!}
                               
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Social Media:</strong>
                                {!! Form::text('social_media', null, array('placeholder' => 'Social Media','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Link:</strong>
                                {!! Form::text('link', null, array('placeholder' => 'Link','class' => 'form-control')) !!}
                            </div>
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                         {!! Form::close() !!}
                          
                        </div>
                        
                    </div>
                     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Create Your Quotes
                        </div>
                        <div class="panel-body">
                        {!! Form::open(array('route' => 'quotes.store','method'=>'POST')) !!}
                        
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quote:</strong>
                                {!! Form::text('quote', null, array('placeholder' => 'Your Quote','class' => 'form-control')) !!}
                            </div>
                        </div>

                       
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                         {!! Form::close() !!}
                          
                        </div>
                        
                    </div>
                    
                    <!-- /.panel -->
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Your Social Media
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                            @foreach($medsoss as $medsos)
                                <a href="{{$medsos->link}}" class="list-group-item">
                                    {!!$medsos->tag_icon!!} {{$medsos->icon}}
                                    <span class="pull-right text-muted small"><em>{{$medsos->social_media}}</em>
                                    </span>
                                </a>
                                 {!! Form::open(['method' => 'DELETE','route' => ['medsos.destroy', $medsos->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                            @endforeach
                               
                            </div>
                            <!-- /.list-group -->
                             </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Your Quotes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                                 @foreach($quotes as $quote)
                                <li class ="timeline-inverted">
                                    <div class="timeline-badge"><i class="fa fa-comment fa-fw"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{$quote->quote}}</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{$quote->created_at}}</small>
                                            </p>
                                        </div>
                                       
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>

        
@endsection