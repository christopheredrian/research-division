@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>
    <style>
        td a {
            width: 100%;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.min.js"></script>
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('table').DataTable();
            $('table').mark('{{ request('q') }}')
        });
    </script>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-text"></i>
                Notifications
            </h3>
        </div>
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Comments/Suggestions
                            <span data-toggle="tooltip" title="" class="badge bg-yellow"
                                  data-original-title="Result Count">{{ $suggestions->count() }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Responses
                            <span data-toggle="tooltip" title="" class="badge bg-yellow"
                                  data-original-title="Result Count">{{ $responses->count() }}</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover dt-bootstrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Suggestion</th>
                                    <th>Ordinance/Resolution</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suggestions as $item)
                                    <tr>
                                        <td>{{ $item->first_name.' '.$item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->suggestion }}</td>
                                        <td>
                                        @if($item->ordinances->first() != null)
                                            {{'Ordinance no. '.$item->ordinances->first()->number.' Series of '.$item->ordinances->first()->series}}
                                        @else
                                            {{'Resolution no. '.$item->resolutions->first()->number.' Series of '.$item->resolutions->first()->series}}
                                        @endif
                                        </td>
                                        <td>
                                            @if($item->ordinances()->first() != null)
                                                <a class="btn btn-flat btn-sm btn-primary"
                                                   href="{{ url('/admin/showComments/'.$item->ordinances()->first()->id.'/ordinances')}}">Open</a>
                                                    @else
                                                <a class="btn btn-flat btn-sm btn-primary"
                                                   href="{{ url('/admin/showComments/'.$item->resolutions()->first()->id.'/resolutions')}}">Open</a>
                                            @endif
                                             <br>
                                                @if($item->ordinances()->first() != null)
                                                    <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                                       href="{{ url('/admin/showComments/'.$item->ordinances()->first()->id.'/ordinances')}}">Open in new Tab</a>
                                                @else
                                                    <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                                       href="{{ url('/admin/showComments/'.$item->resolutions()->first()->id.'/resolutions')}}">Open in new Tab</a>
                                                @endif
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Ordinance/Resolution</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($responses as $item)
                                    <tr>
                                        <td>@if($item->firstname === null || $item->lastname === null)Anonymous
                                            @else{{ $item->firstname.' '.$item->lastname }}
                                            @endif</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->questionnaire->ordinance_id != null)
                                                {{'Ordinance no. '.\App\Ordinance::FindOrFail($item->questionnaire->ordinance_id)->number.' Series of '.\App\Ordinance::FindOrFail($item->questionnaire->ordinance_id)->series}}
                                            @else
                                                {{'Resolution no. '.\App\Ordinance::FindOrFail($item->questionnaire->resolution_id)->number.' Series of '.\App\Ordinance::FindOrFail($item->questionnaire->resolution_id)->series}}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-flat btn-sm btn-primary"
                                               href="{{ url('/admin/result/' . $item->questionnaire_id)}}">Open</a> <br>
                                            <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                               href="{{ url('/admin/result/' . $item->questionnaire_id)}}">Open in new Tab</a>
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