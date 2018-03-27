@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Prototype
            <small>Version 0.1</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{\App\Ordinance::where('is_monitoring',0)->count()}}</h3>

                        <p>R&R Ordinances</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-stopwatch"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{\App\Resolution::where('is_monitoring',0)->count()}}</h3>

                        <p>R&R Resolutions</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-stopwatch"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{ \App\Ordinance::where('is_monitored',1)->count() }}</h3>

                        <p>Monitored Ordinances</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-search"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{ \App\Resolution::where('is_monitored',1)->count() }}</h3>

                        <p>Monitored Resolutions</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-search"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{\App\Ordinance::where('is_monitoring',1)->count()}}</h3>

                        <p>Ordinances Being Monitored</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{\App\Resolution::where('is_monitoring',1)->count()}}</h3>

                        <p>Resolutions Being Monitored</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">

                        <h3>{{ \App\Suggestion::count() }}
                        </h3>


                        <p>Comments/Suggestions</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-paper-plane"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{ \App\Response::count() }}
                        </h3>

                        <p>Feedback</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-chatbox-working"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{ \App\Questionnaire::count() }}</h3>

                        <p>Questionnaires</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-question-circle-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3> {{ \App\Log::count() }}</h3>

                        <p>Total Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-light-blue">
                    <div class="inner">
                        <h3>{{ \App\User::count() }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recent Comments/Suggestions</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($suggestions as $suggestion)
                                <li class="item">
                                    <div class="product-info">
                                        @if($suggestion->ordinances()->first() != null)
                                            <a href="/admin/showComments/{{$suggestion->ordinances()->first()->id}}/ordinances"
                                               class="product-title">
                                                @else
                                                    <a href="/admin/showComments/{{$suggestion->resolutions()->first()->id}}/resolutions"
                                                       class="product-title">
                                                        @endif
                                                        {{$suggestion->first_name.' '.$suggestion->last_name.'    '}}


                                                        <span class="label label-info pull-right">{{$suggestion->created_at}}</span></a>
                                                <br/>
                                                    <span class="product-title">
                                                        @if($suggestion->ordinances->first() != null)
                                                            {{'Ordinance no. '.$suggestion->ordinances->first()->number.' Series of '.$suggestion->ordinances->first()->series}}
                                                        @else
                                                            {{'Resolution no. '.$suggestion->resolutions->first()->number.' Series of '.$suggestion->resolutions->first()->series}}
                                                        @endif
                                                    </span>
                                                    <span class="product-description">
                                        {{$suggestion->suggestion}}
                                     </span>
                                    </div>

                                </li>
                        @endforeach
                        <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recent Responses</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($responses as $response)
                                <li class="item">
                                    <div class="product-info">
                                        <a href="/admin/result/{{$response->questionnaire_id}}"
                                           class="product-title">
                                            @if($response->first_name == null && $response->last_name == null)
                                                Anonymous
                                            @else
                                                {{$response->first_name.' '.$response->last_name}}
                                            @endif

                                            <span class="label label-info pull-right">{{$response->created_at}}</span></a>
                                        <br/>
                                        <span class="product-title">
                                            {{--@php--}}
                                            {{--dd(\App\Ordinance::FindOrFail($response->questionnaire->ordinance_id)->number);--}}
                                            {{--@endphp--}}
                                            @if($response->questionnaire->ordinance_id != null)
                                                {{'Ordinance no. '.\App\Ordinance::FindOrFail($response->questionnaire->ordinance_id)->number.' Series of '.\App\Ordinance::FindOrFail($response->questionnaire->ordinance_id)->series}}
                                            @else
                                                {{'Resolution no. '.\App\Ordinance::FindOrFail($response->questionnaire->resolution_id)->number.' Series of '.\App\Ordinance::FindOrFail($response->questionnaire->resolution_id)->series}}
                                            @endif
                                        </span>
                                        <span class="product-description">
                                        {{$response->email}}
                                     </span>
                                    </div>
                                </li>
                        @endforeach
                        <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recent Logs</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">User</th>
                                <th>Message</th>
                                <th>Ip</th>
                                <th style="width: 40px">Timestamp</th>
                            </tr>
                            @foreach(\App\Log::orderBy('id', 'desc')->limit(5)->get() as $log)
                                <tr>
                                    <td>{{ $log->user }}</td>
                                    <td>{{ $log->message }}</td>
                                    <td>{{ $log->ip }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-xs-4">


            </div>
        </div>

    </section>
@endsection