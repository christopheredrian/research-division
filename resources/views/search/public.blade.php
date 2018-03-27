@extends('layouts.public')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>
    <style>
        button#search-btn {
            height: 34px;
            width: 40px;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.min.js"></script>
    <script>
        $(document).ready(function () {
            $('table').DataTable();
            $('table').mark('{{ request('q') }}')
        });
    </script>
@endsection

@section('content')
    <div class="container box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-text"></i>
                Search Results
            </h3>
        </div>
        <div class="box-body">

            <form action="#" method="get" class="pull-right" style="margin: 15px 0  0 40%">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."
                           value="{{ request()->q }}">
                    <span class="input-group-btn">
                               <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                 <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <a style="margin-top: 10px;" href="{{ url()->current() }}" class="btn btn-primary pull-right">
                    <i class="fa fa-refresh"></i> Reset
                </a>
            </form>

        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab">R&R Ordinances
                        <span data-toggle="tooltip" title="" class="badge bg-yellow"
                              data-original-title="Result Count">{{ $rnr_o->count() }}</span>
                    </a>
                </li>
                <li>
                    <a href="#tab_2" data-toggle="tab">R&R Resolutions
                        <span data-toggle="tooltip" title="" class="badge bg-yellow"
                              data-original-title="Result Count">{{ $rnr_r->count() }}</span>
                    </a>
                </li>
                <li>
                    <a href="#tab_3" data-toggle="tab">M&E Ordinances
                        <span data-toggle="tooltip" title="" class="badge bg-yellow"
                              data-original-title="Result Count">{{ $mne_o->count() }}</span>
                    </a>
                </li>
                <li>
                    <a href="#tab_4" data-toggle="tab">M&E Resolutions
                        <span data-toggle="tooltip" title="" class="badge bg-yellow"
                              data-original-title="Result Count">{{ $mne_r->count() }}</span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover dt-bootstrap">
                            <thead>
                            <tr>
                                <th>Ordinance Number</th>
                                <th>Series</th>
                                <th>Title</th>
                                <th>Keywords</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rnr_o as $item)
                                <tr>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->series }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->keywords }}</td>
                                    <td>
                                        <a class="btn btn-flat btn-sm btn-primary"
                                           href="{{ url('/public/showOrdinance/' . $item->id)}}">Open</a> <br>
                                        <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                           href="{{ url('/public/showOrdinance/' . $item->id)}}">Open in new Tab</a>
                                        <br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Resolution Number</th>
                                <th>Series</th>
                                <th>Title</th>
                                <th>Keywords</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rnr_r as $item)
                                <tr>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->series }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->keywords }}</td>
                                    <td>
                                        <a class="btn btn-flat btn-sm btn-primary"
                                           href="{{ url('/public/showResolution/' . $item->id)}}">Open</a> <br>
                                        <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                           href="{{ url('/public/showResolution/' . $item->id)}}">Open in new
                                            Tab</a>
                                        <br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Ordinance Number</th>
                                <th>Series</th>
                                <th>Title</th>
                                <th>Keywords</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mne_o as $item)
                                <tr>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->series }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->keywords }}</td>
                                    <td>{!!  $item->isAccepting()  ? '<span class="label label-success">Monitoring</span>':
                                        '<span class="label label-danger">Not Monitoring</span>'!!}
                                    </td>
                                    <td>
                                        <a class="btn btn-flat btn-sm btn-primary"
                                           href="{{ url('/public/showOrdinance/' . $item->id)}}">Open</a> <br>
                                        <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                           href="{{ url('/public/showOrdinance/' . $item->id)}}">Open in new Tab</a>
                                        <br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab_4">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Resolution Number</th>
                                <th>Series</th>
                                <th>Title</th>
                                <th>Keywords</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mne_r as $item)
                                <tr>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->series }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->keywords }}</td>
                                    <td>{!!  $item->isAccepting()  ? '<span class="label label-success">Monitoring</span>':
                                        '<span class="label label-danger">Not Monitoring</span>'!!}
                                    </td>
                                    <td>
                                        <a class="btn-flat btn btn-sm btn-primary"
                                           href="{{ url('/public/showResolution/' . $item->id)}}">Open</a> <br>
                                        <a class="btn-flat btn btn-sm btn-info" target="_blank"
                                           href="{{ url('/public/showResolution/' . $item->id)}}">Open in new
                                            Tab</a>
                                        <br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
    </div>
@endsection