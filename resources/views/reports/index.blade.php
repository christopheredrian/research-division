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
                                    <input name="series" type="number" class="form-control" id="series" value="{{ old('series')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="includes[]">Include:</label>
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="rrOrdinances"> R&R Ordinances
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoringOrdinances"> Monitoring Ordinances
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoredOrdinances"> Monitored Ordinances
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="rrOrdinances"> R&R Resolutions
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoringOrdinances"> Monitoring Resolutions
                                    <br>
                                    <input name="includes[]" type="checkbox" id="series" value="monitoredOrdinances"> Monitored Resolutions
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success center-block">Search Reports</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Results {!! isset($series) === true ? ('for the year <strong>' . $series . '</strong>') : '' !!}</h3>
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
                                        <td>{{$value}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection