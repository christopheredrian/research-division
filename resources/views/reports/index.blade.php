@extends('layouts.admin')
@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Reports</h3>
                <a href="/reports" class="btn btn-sm btn-primary pull-right">
                    <i class="fa fa-refresh"></i>
                     Reset Filter
                </a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('postreports') }}" enctype="multipart/form-data" id="ordinancesForm">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="series">Year/Series</label>
                                    <input name="series" type="number" class="form-control" id="series" value="{{ isset($series) ? $series : old('series') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="includes[]">Include:</label>
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="rrOrdinances" {{ isset($results['R&R Ordinances']) ? 'checked=checked' : '' }}> R&R Ordinances
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoringOrdinances" {{ isset($results['Monitoring Ordinances']) ? 'checked=checked' : '' }}> Ordinances being Monitored
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoredOrdinances" {{ isset($results['Monitored Ordinances']) ? 'checked=checked' : '' }}> Monitored Ordinances
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="rrResolutions" {{ isset($results['R&R Resolutions']) ? 'checked=checked' : '' }}> R&R Resolutions
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoringResolutions" {{ isset($results['Monitoring Resolutions']) ? 'checked=checked' : '' }}> Resolutions being Monitored
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoredResolutions" {{ isset($results['Monitored Resolutions']) ? 'checked=checked' : '' }}> Monitored Resolutions
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success center-block">
                                <i class="fa fa-search"></i>
                                Search Reports
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border text-center">
                <h3 class="box-title">
                    Results {!! isset($series) === true ? ('for the year <strong>' . $series . '</strong>') : '' !!}
                </h3>

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            @if(isset($results))
                                @foreach($results as $key => $value)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{count($value)}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            @if(isset($results))
                                <a href="{{ route('downloadReport') }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-file-excel-o"></i>
                                    Download Excel
                                </a>
                            @endif
                        </div>

                        <div class="pull-right">
                            @if(session()->pull('LR_monitored_ordinances'))
                                <a href="/downloadLegislativeReport/ordinances" class="btn btn-sm btn-primary">
                                    <i class="fa fa-download"></i>
                                    Ordinances Legislative Report
                                </a>
                            @endif

                            @if(session()->pull('LR_monitored_resolutions'))
                                <a href="/downloadLegislativeReport/resolutions" class="btn btn-sm btn-info">
                                    <i class="fa fa-download"></i>
                                    Resolutions Legislative Report
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection