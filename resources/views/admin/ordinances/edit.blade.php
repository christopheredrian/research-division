@extends('layouts.admin')


@section('content')

    <ol class="breadcrumb">
        @if(!$ordinance->is_monitoring)
            <li><a href="/admin/ordinances"><i class="fa fa-book"></i> Research & Records</a></li>
            <li><a href="/admin/ordinances">Ordinances</a></li>
        @else
            <li><a href="/admin/forms/ordinances"><i class="fa fa-bar-chart"></i> Monitoring & Evaluation</a></li>
            <li>
                @if($ordinance->is_monitored)
                    <a href="/admin/forms/ordinances?status=monitored"><i class="fa fa-file-text"></i>
                        Monitored Ordinances
                    </a>
                @else
                    <a href="/admin/forms/ordinances"><i class="fa fa-file-text"></i>
                        Ordinances being monitored
                    </a>
                @endif
            </li>
        @endif
        <li><a href="/admin/ordinances/{{$ordinance->id}}">{{'Ordinance ' . $ordinance->number . ' series of ' . $ordinance->series }}</a></li>
        <li class="active">Edit</li>
    </ol>
    <div class="row">
        <div class="{{$ordinance->is_monitored ? 'col-md-12' : 'col-md-6 col-md-offset-3' }}">
            <div class="box box-primary color-palette-box">
                <div class="box-header with-border">
                    {{--'number', 'title', 'description', 'authors'--}}
                    <h3 class="box-title">Edit ORDINANCE {{ $ordinance->number . ' - ' . $ordinance->series}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="{{ url("/admin/ordinances/{$ordinance->id}/") }}" id="ordinancesForm"
                      enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-md-{{$ordinance->is_monitored ? '6' : '12'}}">
                            <div class="form-group {{$errors->has('number') ? 'has-error' : ''}}">
                                <label for="number">Number</label>
                                <input name="number" type="text" class="form-control" id="number"
                                       placeholder="Enter Ordinance Number"
                                       value="{{old('number', $ordinance->number)}}">
                                {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{$errors->has('series') ? 'has-error' : ''}}">
                                <label for="series">Series</label>
                                <input name="series" type="text" class="form-control" id=series"
                                       placeholder="Enter Ordinance Series"
                                       value="{{old('series', $ordinance->series)}}">
                                {!! $errors->first('series', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                <label for="title">Title</label>
                                <textarea class="form-control capitalize" rows="5" name="title" id="title"
                                          form="ordinancesForm">{{old('title', $ordinance->title)}}</textarea>
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{$errors->has('keywords') ? 'has-error' : ''}}">
                                <label for="keywords">Keywords</label>
                                <textarea class="form-control" rows="5" name="keywords" id="keywords"
                                          form="ordinancesForm">{{trim(old('keywords', $ordinance->keywords))}}</textarea>
                                {!! $errors->first('keywords', '<p class="help-block">:message</p>') !!}
                            </div>

                                <label for="is_accepting">Comments/Suggestions</label>
                                <div class="checkbox">
                                    <label><input name="is_accepting" type="checkbox"
                                                  value=1 @if($ordinance->is_accepting==1) {{"checked"}} @endif>Accept
                                        Comments</label>
                                </div>


                            @if(\App\Http\NLPUtilities::isNLPEnabled())
                                @if(!$ordinance->facebook_post_id)
                                    <label for="fbpost">Facebook Post (No Connected Post to Facebook yet)</label>
                                    <div class="checkbox">
                                        <label><input name="fbpost" type="checkbox" value=1>Post to Facebook</label>
                                    </div>
                                @endif
                            @endif

                            <div class="form-group">
                                <label for="pdf">
                                    {{$ordinance->pdf_file_path == "" ? 'No File Uploaded': ('PDF File: ' . substr($ordinance->pdf_file_path, strrpos( $ordinance->pdf_file_path, '/' ) + 1 ))}}
                                </label>
                                <input name="pdf" type="file" class="form-control" id="pdf" accept="application/pdf">
                            </div>
                        </div>

                        @if($ordinance->is_monitored)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_report_date">Date of Status Report</label>
                                    {{--                                    <input name="from" type="date" class="form-control" value="{{ request('from') ? request('from') : '' }}">--}}
                                    <input name="status_report_date" type="date" class="form-control"
                                           id="status_report_date"
                                           value="{{old('status_report_date', $ordinance->status_report_date)}}">
                                </div>

                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea class="form-control" rows="5" name="summary" id="summary"
                                              form="ordinancesForm">{{old('summary', $ordinance->summary)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <textarea class="form-control" rows="4" name="status" id="status"
                                              form="ordinancesForm">{{old('status', $ordinance->status)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="legislative_action">Legislative Action</label>
                                    <textarea class="form-control" rows="4" name="legislative_action"
                                              id="legislative_action"
                                              form="ordinancesForm">{{old('legislative_action', $ordinance->legislative_action)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="updates">Updates</label>
                                    <textarea class="form-control" rows="4" name="updates" id="updates"
                                              form="ordinancesForm">{{old('updates', $ordinance->updates)}}</textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="pull-right btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
    {{--<div class="col-md-6">--}}
    {{--<iframe src = "/ViewerJS/#../storage/ordinances/{{substr($ordinance->pdf_file_path, strrpos( $ordinance->pdf_file_path, '/' ) + 1 )}}"--}}
    {{--width='100%' height='350' allowfullscreen webkitallowfullscreen></iframe>--}}
    {{--</div>--}}
@endsection