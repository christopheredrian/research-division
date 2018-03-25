@extends('layouts.admin')


@section('content')
    <ol class="breadcrumb">
        @if($resolution->is_monitoring == 0)
            <li><a href="/admin/resolutions"><i class="fa fa-book"></i> Research & Records</a></li>
            <li><a href="/admin/resolutions">Resolutions</a></li>
        @else
            <li><a href="/admin/forms/resolutions"><i class="fa fa-bar-chart"></i> Monitoring & Evaluation</a></li>
            <li>
                @if($resolution->is_monitored)
                    <a href="/admin/forms/resolutions?status=monitored"><i class="fa fa-file-text"></i>
                        Monitored Resolutions
                    </a>
                @else
                    <a href="/admin/forms/ordinances"><i class="fa fa-file-text"></i>
                        Resolutions being monitored
                    </a>
                @endif
            </li>
        @endif
        <li><a href="/admin/resolutions/{{$resolution->id}}">{{'Ordinance ' . $resolution->number . ' series of ' . $resolution->series }}</a></li>
        <li class="active">Edit</li>
    </ol>

    <div class="row">
        <div class="{{$resolution->is_monitored ? 'col-md-12' : 'col-md-6 col-md-offset-3' }}">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit RESOLUTION {{ $resolution->number . ' - ' . $resolution->series }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="{{ url("/admin/resolutions/{$resolution->id }/") }}" id="resolutionsForm"
                      enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-md-{{$resolution->is_monitored ? '6' : '12'}}">
                            <div class="form-group {{$errors->has('number') ? 'has-error' : ''}}">
                                <label for="number">Number</label>
                                <input name="number" type="text" class="form-control" id="number"
                                       value="{{ $resolution->number }}">
                                {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{$errors->has('series') ? 'has-error' : ''}}">
                                <label for="series">Series</label>
                                <input name="series" type="text" class="form-control" id=series"
                                       placeholder="Enter Ordinance Series" value="{{ $resolution->series }}">
                                {!! $errors->first('series', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                <label for="title">Title</label>
                                <textarea class="form-control" rows="5" name="title" id="title"
                                          form="resolutionsForm">{{old('title', $resolution->title)}}</textarea>
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{$errors->has('keywords') ? 'has-error' : ''}}">
                                <label for="keywords">Keywords</label>
                                <textarea class="form-control" rows="5" name="keywords" id="keywords"
                                          form="resolutionsForm">{{ $resolution->keywords }}</textarea>
                                {!! $errors->first('keywords', '<p class="help-block">:message</p>') !!}
                            </div>

                            @if(request()->type === 'ME')
                                <label for="is_accepting">Comments/Suggestions</label>
                                <div class="checkbox">
                                    <label><input name="is_accepting" type="checkbox" value=1
                                                {{$resolution->is_accepting == 1 ? 'checked' : '' }}>Accept
                                        Comments</label>
                                </div>
                            @endif

                            @if(\App\Http\NLPUtilities::isNLPEnabled())
                                @if(!$resolution->facebook_post_id)
                                    <label for="fbpost">Facebook Post (No Connected Post to Facebook yet)</label>
                                    <div class="checkbox">
                                        <label><input name="fbpost" type="checkbox" value=1>Post to Facebook</label>
                                    </div>
                                @endif
                            @endif

                            <div class="form-group">
                                <label for="pdf">
                                    {{$resolution->pdf_file_path == "" ? 'No File Uploaded': ('PDF File: ' . substr($resolution->pdf_file_path, strrpos( $resolution->pdf_file_path, '/' ) + 1 ))}}
                                </label>
                                <input name="pdf" type="file" class="form-control" id="pdf" accept="application/pdf">
                            </div>

                        </div>

                        @if($resolution->is_monitored)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_report_date">Date of Status Report</label>
                                    {{--                                    <input name="from" type="date" class="form-control" value="{{ request('from') ? request('from') : '' }}">--}}
                                    <input name="status_report_date" type="date" class="form-control"
                                           id="status_report_date"
                                           value="{{old('status_report_date', $resolution->status_report_date)}}">
                                </div>

                                <div class="form-group">
                                    <label for="summary">Summary</label>
                                    <textarea class="form-control" rows="5" name="summary" id="summary"
                                              form="resolutionsForm">{{old('summary', $resolution->summary)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <textarea class="form-control" rows="4" name="status" id="status"
                                              form="resolutionsForm">{{old('status', $resolution->status)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="legislative_action">Legislative Action</label>
                                    <textarea class="form-control" rows="4" name="legislative_action"
                                              id="legislative_action"
                                              form="resolutionsForm">{{old('legislative_action', $resolution->legislative_action)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="updates">Updates</label>
                                    <textarea class="form-control" rows="4" name="updates" id="updates"
                                              form="resolutionsForm">{{old('updates', $resolution->updates)}}</textarea>
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
@endsection