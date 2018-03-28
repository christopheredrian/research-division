@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

    <style>
        form {
            display: inline;
        }

        .btn-equal-width {
            margin: 0 auto;
            width: 62px;
        }

        .box-comment > i {
            height: 100%;
            font-size: 22px;
        }
    </style>
@endsection

@section('content')
    <ol class="breadcrumb">
        @if(!$ordinance->is_monitoring)
            <li><a href="/admin/ordinances"><i class="fa fa-book"></i> Research & Records</a></li>
            <li><a href="/admin/ordinances">Ordinances</a></li>
        @else
            <li><a href="/admin/forms/ordinances"><i class="fa fa-file-text"></i> Monitoring & Evaluation</a></li>
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
        <li class="active">{{'Ordinance ' . $ordinance->number . ' series of ' . $ordinance->series }}</li>
    </ol>

    @if($ordinance->is_monitoring === 1)
        {{-- IS in M&E --}}
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary color-palette-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> Questionnaire</h3>
                        @if($questionnaire)
                            {{--It has a questionnaire--}}
                            <div class="pull-right">
                                @if($ordinance->is_monitored === 0)
                                    @if($questionnaire->isAccepting == 0)
                                        <form style="display: inline;" method="post"
                                              action="{{ url('/admin/acceptResponses/' . $questionnaire->id) }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-success">
                                                <span class="fa fa-comments-o"></span> Accept Responses
                                            </button>
                                        </form>
                                        @if(!$questionnaire->hasAnswers())
                                            <a href="{{ url("/admin/forms/{$questionnaire->id}/edit") }}"
                                               class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>
                                        @endif
                                    @else
                                        <form style="display: inline;" method="post"
                                              action="{{ url('/admin/declineResponses/' . $questionnaire->id) }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">

                                                <span class="fa fa-times"></span> Decline Responses
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                <a href="{{"/admin/result/{$questionnaire->id}"}}"
                                   class="btn btn-success"><span class="fa fa-th-list"></span> Results</a>
                                {{--<a href="{{"/admin/forms/{$questionnaire->id}"}}"--}}
                                {{--class="btn btn-info"><span><span--}}
                                {{--class="fa fa-eye"></span> Preview</span></a>--}}
                                <a href="{{ url("/admin/previewOrdinance/{$questionnaire->ordinance_id }/") }}"
                                   target="_blank"
                                   class="btn  btn-danger">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    Print</a>


                                @if($ordinance->is_monitored === 0)
                                    {{--<form style="display: inline;" method="post"--}}
                                    {{--action="{{ url('/admin/forms/' . $questionnaire->id) }}">--}}
                                    {{--{{ method_field('DELETE') }}--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<button class="btn btn-danger"--}}
                                    {{--onclick="return confirm('Are you sure you want to remove this Questionnaire?')">--}}
                                    {{--<span class="fa fa-trash"></span> Delete--}}
                                    {{--</button>--}}
                                    {{--</form>--}}
                                    <button class="btn btn-danger btn-equal-width" data-toggle="modal"
                                            data-target="#exampleModal">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Confirm Delete</h3>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this questionnaire?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <form style="display: inline;" method="post"
                                                          action="{{ url('/admin/forms/' . $questionnaire->id) }}">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endif
                            </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <p>
                                @if($questionnaire->isAccepting == 1)
                                    Public Link: <a
                                            href="/answer.o/{{$ordinance->id}}">{{env("APP_URL", " ").'/answer.o/'.$ordinance->id}}</a>
                                    <br>
                                    Required Link: <a
                                            href="/answer.o/{{$ordinance->id}}/required">{{env("APP_URL", " ").'/answer.o/'.$ordinance->id}}
                                        /required</a>
                                @endif
                            </p>
                            <p>{{ $questionnaire->description }}</p>
                            <p><strong>Number of Responses:</strong> {{ $questionnaire->getResponseCount() }}</p>
                        </div>
                        @else
                            @if($ordinance->is_monitored === 0)
                                <a href="/admin/forms/create?flag={{ $flag }}&ordinance_id={{$ordinance->id}}"
                                   class="btn btn-success">Create Questionnaire</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @if(!$ordinance->is_monitoring)
            <div class="col-md-7">
                <div class="panel panel-info">
                    <div class="panel-body">
                        @if($ordinance->pdf_link)
                            <iframe src="{{$ordinance->pdf_link}}"
                                    width='100%' height='350' allowfullscreen webkitallowfullscreen></iframe>
                        @else
                            <h3 class="text-center">PDF not available.</h3>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-{{$ordinance->is_monitoring ? '12' : '5'}}">
            <div class="row">
                <div class="box box-success color-palette-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> ORDINANCE {{ $ordinance->number }}</h3>
                        <div class="pull-right">
                            <a href="/admin/ordinances/{{$ordinance->id}}/edit?type={{$ordinance->is_monitoring === 1 ? 'ME' : 'RR'}}"
                               class="btn btn-warning">
                                <i class="fa fa-edit"></i>
                                Edit
                            </a>
                            <a href="{{($ordinance->pdf_file_path === "" or $ordinance->pdf_file_path == null) ? '#' : ("/downloadPDF/ordinances/".$ordinance->pdf_file_name)}}"
                               class="btn btn-primary {{($ordinance->pdf_file_path === "" or $ordinance->pdf_file_path == null)? 'disabled' : ''}}">
                                <i class="fa fa-download"></i>
                                Download Ordinance
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-{{ $ordinance->is_monitored ? '5' : '12' }}">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Ordinance Number</th>
                                        <td>{{ $ordinance->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Series</th>
                                        <td>{{ $ordinance->series }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ str_limit($ordinance->title, $limit = 150, $end = '...') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keywords</th>
                                        <td>{{ str_limit($ordinance->keywords, $limit = 150, $end = '...') }}</td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                            @if($ordinance->is_monitored)
                                <div class="col-md-7">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Date of Status Report</th>
                                            <td>{{ $ordinance->status_report_date ? $ordinance->status_report_date : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Summary</th>
                                            <td>{{ $ordinance->summary ? str_limit($ordinance->summary, $limit = 150, $end = '...') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{ $ordinance->status ? str_limit($ordinance->status, $limit = 150, $end = '...') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Legislative Action</th>
                                            <td>{{ $ordinance->legislative_action ? $ordinance->legislative_action : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updates</th>
                                            <td>{{ $ordinance->updates ? $ordinance->updates : 'N/A' }}</td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($ordinance->is_monitoring === 1)
        <div class="row">
            @if($ordinance->is_monitoring)
                <div class="col-md-7">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            @if($ordinance->pdf_link)
                                <iframe src="{{$ordinance->pdf_link}}"
                                        width='100%' height='350' allowfullscreen webkitallowfullscreen></iframe>
                            @else
                                <h3 class="text-center">PDF not available.</h3>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-5">
                <div class="box box-success color-palette-box">
                    <div class="box-header with-border">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#status">Status Report</a></li>
                            <li {{($ordinance->statusReport === null or $ordinance->statusReport->pdf_file_path === " ") ? "class=disabled" : ' '}}>
                                <a {{($ordinance->statusReport === null or $ordinance->statusReport->pdf_file_path === " ") ? ' ' : "data-toggle=tab" }} href="#update">
                                    Update Reports
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="box-body">
                        <div class="tab-content">
                            <div id="status" class="tab-pane fade in active">
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-md-12">
                                        <a href="/admin/ordinances/{{$ordinance->id}}/upload-status-report"
                                           class="btn btn-sm btn-group btn-soundcloud {{ $ordinance->questionnaire === null  ? 'disabled' : ''}}">
                                            <i class="fa fa-file-text"></i>
                                            {{($ordinance->statusReport === null or  $ordinance->statusReport->pdf_file_path === " ") ? 'Upload' : 'Reupload'}}
                                            Status Report
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @if($ordinance->statusReport !== null and $ordinance->statusReport->pdf_file_path !== " ")
                                            <table class="table table-striped table-bordered">
                                                <tr class="text-center">
                                                    <th>Status Report Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$ordinance->statusReport->pdf_file_name}}</td>
                                                    <td>
                                                        <a href="/downloadPDF/statusreports/{{$ordinance->statusReport->pdf_file_name}}"
                                                           class="btn btn-sm btn-primary">
                                                            Download
                                                        </a>
                                                        <a href="/deletePDF/statusreports/{{$ordinance->statusReport->pdf_file_name}}"
                                                           class="btn btn-sm btn-danger deletePDFButton">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        @else
                                            <div class="row text-center">
                                                <h4>No uploaded status report.</h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="update" class="tab-pane fade">
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-md-12">
                                        <a href="/admin/ordinances/{{$ordinance->id}}/upload-update-report"
                                           class="btn btn-sm btn-group btn-primary ">
                                            <i class="fa fa-file-text"></i>
                                            Upload Update Report
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($ordinance->updateReport()->where('is_deleted', 0)->first())
                                            <table class="table table-striped table-bordered">
                                                <tr class="text-center">
                                                    <th>Update Report Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach($ordinance->updateReport()->where('is_deleted', 0)->get() as $updateReport)
                                                    <tr>
                                                        <td>{{$updateReport->pdf_file_name}}</td>
                                                        <td>
                                                            <a href="/downloadPDF/updatereports/{{$updateReport->pdf_file_name}}"
                                                               class="btn btn-xs btn-primary">
                                                                Download
                                                            </a>
                                                            <a href="/deletePDF/updatereports/{{$updateReport->pdf_file_name}}"
                                                               class="btn btn-xs btn-danger deletePDFButton">
                                                                Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @else
                                            <div class="row text-center">
                                                <h4>No uploaded update reports.</h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        @if(isset($isNLPEnabled) and $ordinance->facebook_post_id !== null)
            <div class="col-md-3 text-center">
                <h4><strong>Ordinance Pulse (Facebook)</strong></h4>
                @if($facebook_comments)
                    <canvas id="pulseChart" width="220" height="240"></canvas>
                @else
                    <h5><i>No comments as of yet.</i></h5>
                @endif

            </div>
        @endif
        <div class="col-md-{{ (isset($isNLPEnabled) and $ordinance->facebook_post_id !== null) ? '9' : '12'}}">
            {{--<div class="row">--}}
            <div class="box box-danger color-palette-box">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"><i class="fa fa-comments-o"></i> Comments/Suggestions</h3>--}}
                    @if($ordinance->is_monitored === 0)
                        @if($ordinance->is_accepting == 0)
                            <form style="display: inline;" method="post"
                                  action="{{ url('/admin/acceptSuggestions/' . $ordinance->id.'/'.$flag) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-success pull-right">
                                    <span class="fa fa-comments-o"></span> Accept Suggestions
                                </button>
                            </form>
                        @else
                            <form style="display: inline;" method="post"
                                  action="{{ url('/admin/declineSuggestions/' . $ordinance->id.'/'.$flag) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger pull-right">
                                    <span class="fa fa-times"></span> Decline Suggestions
                                </button>
                            </form>
                        @endif
                    @endif

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#comments">Comments/Suggestions</a></li>
                        @if(isset($isNLPEnabled))
                            @if(isset($isNLPEnabled) and $ordinance->facebook_post_id !== null)
                                <li>
                                    <a data-toggle="tab" href="#fbComments">
                                        <i class="fa fa-facebook-f"></i>
                                        Facebook Comments
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>

                    <div class="tab-content">
                        <div id="comments" class="tab-pane fade in active">
                            <div class="box-body box-comments">
                                @php
                                    $counter=0;
                                @endphp
                                @foreach($ordinance->suggestions as $suggestion)
                                    @if($counter == 3)
                                        @php
                                            break;
                                        @endphp
                                    @endif

                                    <div class="box-comment">
                                        <!-- User image -->
                                        {{--<img class="img-circle img-sm" src="/dist/img/user3-128x128.jpg" alt="User Image">--}}

                                        <div class="comment-text">
                                                  <span class="username">
                                                    {{ $suggestion->first_name }} {{ $suggestion->last_name }}
                                                      <span class="text-muted pull-right">{{ $suggestion->created_at }}</span>
                                                  </span><!-- /.username -->
                                            {{ $suggestion->suggestion }}
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                    @php
                                        $counter=$counter+1;
                                    @endphp
                                @endforeach
                                <a href="/admin/showComments/{{$ordinance->id}}/ordinances" class="pull-right">View
                                    all</a>
                            </div>
                        </div>

                        @if(isset($isNLPEnabled) and $ordinance->facebook_post_id !== null)
                            <div id="fbComments" class="tab-pane fade">
                                @if(!isset($facebook_comments))
                                    <h4 class="text-center">No comments as of yet.</h4>
                                @else
                                    <table id="dataTable" class="table table-hover dt-bootstrap">
                                        <thead>
                                        <tr>
                                            <th>Sentiment</th>
                                            <th>Name</th>
                                            <th>Comment</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($facebook_comments as $facebook_comment)
                                            <tr>
                                                <td>
                                                    @if($facebook_comment['result']->sentiment === 'positive')
                                                        <i class="pull-left fa fa-smile-o text-success"></i>
                                                        Positive
                                                    @elseif($facebook_comment['result']->sentiment === 'negative')
                                                        <i class="pull-left fa fa-minus text-danger"></i> Negative
                                                    @elseif($facebook_comment['result']->sentiment === 'neutral')
                                                        <i class="pull-left fa fa-warning text-warning"></i> Neutral
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>

                                                <td>{{ $facebook_comment['name'] }}</td>
                                                <td>{{ $facebook_comment['result']->sentence }}</td>
                                                <td>{{ $facebook_comment['created_time'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{--</div>--}}
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script type="text/javascript">
        $('.deletePDFButton').click(function (e) {
            var link = e.target;
            var fileName = $(link).parent().parent().children().first().text();
            return confirm("Are you sure you want to delete the file " + fileName + "?");
        });

        function printExternal(url) {
            var printWindow = window.open(url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
            printWindow.addEventListener('load', function () {
                printWindow.print();
                printWindow.close();
            }, true);
        }
    </script>
    @if($facebook_comments)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
        <script async="false">
            var config = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [
                            {{isset($positive_count) ? $positive_count : 0}},
                            {{isset($negative_count) ? $negative_count : 0}},
                            {{isset($neutral_count) ? $neutral_count : 0}}
                        ],
                        backgroundColor: [
                            "#46BFBD",
                            "#F7464A",
                            "#FDB45C"
                        ],
                    }],
                    labels: [
                        "Positive Sentiments",
                        "Negative Sentiments",
                        "Neutral Sentiments"
                    ]
                },
                options: {
                    responsive: true
                }
            };

            window.onload = function () {
                var ctx = document.getElementById("pulseChart").getContext("2d");
                window.myPie = new Chart(ctx, config);
            };

        </script>
    @endif
@endsection