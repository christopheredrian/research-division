@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

    <style>
        .box-comment > i {
            height: 100%;
            font-size: 22px;
        }
    </style>
@endsection

@section('content')

    <ol class="breadcrumb">
        @if(!$resolution->is_monitoring)
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
                    <a href="/admin/forms/resolutions"><i class="fa fa-file-text"></i>
                        Resolutions Currently being monitored
                    </a>
                @endif
            </li>
        @endif
        <li class="active">{{$resolution->id}}</li>
    </ol>

    @if($resolution->is_monitoring === 1)
        {{-- IS in M&E --}}
        <div>
            <div class="box box-primary color-palette-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-file-text"></i> Questionnaire</h3>
                    @if($questionnaire)
                        {{--It has a questionnaire--}}
                        <div class="pull-right">
                            @if($resolution->is_monitored === 0)
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
                                    <a href="/answer.r/{{$resolution->id}}/required?admin=1"
                                       class="btn  btn-success">
                                        Answer Questionnaire </a>
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
                            {{--<a href="{{"/admin/forms/{$questionnaire->id}"}}" class="btn btn-info"><span><span--}}
                            {{--class="fa fa-eye"></span> Preview</span></a>--}}
                            <a href="{{ url("/admin/previewResolution/{$questionnaire->resolution_id }/") }}"
                               target="_blank"
                               class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                Print</a>
                            @if($resolution->is_monitored == 0)
                                {{--<form style="display: inline;" method="post" action="{{ url('/admin/forms/' . $questionnaire->id) }}">--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<button class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this Questionnaire?')">--}}
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
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
                            @endif
                        </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        {{--<h2>{{ $questionnaire->name }}</h2>--}}
                        <p>
                            @if($resolution->is_monitored == 0)
                                @if($questionnaire->isAccepting == 1)
                                    Public Link: <a
                                            href="/answer.r/{{$resolution->id}}">{{env("APP_URL", " ").'answer.r/'.$resolution->id}}</a>
                                    <br>
                                    Required Link: <a
                                            href="/answer.r/{{$resolution->id}}/required">{{env("APP_URL", " ").'answer.r/'.$resolution->id}}
                                        /required</a>
                                @endif
                            @endif
                        </p>
                        <p>{{ $questionnaire->description }}</p>
                        <p><strong>Number of Responses:</strong> {{ $questionnaire->getResponseCount() }}</p>
                        @else
                            @if($resolution->is_monitored == 0)
                                <div class="col-xs-12">
                                    <a href="/admin/forms/create?flag={{ $flag }}&resolution_id={{$resolution->id}}"
                                       class="btn btn-success">Create Questionnaire</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @if(!$resolution->is_monitoring)
            <div class="col-md-7">
                <div class="panel panel-info">
                    <div class="panel-body">
                        @if($resolution->pdf_link)
                            <iframe src="{{$resolution->pdf_link}}"
                                    width='100%' height='350' allowfullscreen webkitallowfullscreen></iframe>
                        @elseif($resolution->pdf_file_name)
                            <iframe src="/storage/resolutions/{{$resolution->pdf_file_name}}"
                                    width='100%' height='350' allowfullscreen webkitallowfullscreen></iframe>
                        @else
                            <h3 class="text-center">PDF not available.</h3>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-{{$resolution->is_monitoring ? '12' : '5'}}">
            <div>
                <div class="box box-success color-palette-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> RESOLUTION {{ $resolution->number }}</h3>
                        <div class="pull-right">
                            <a href="/admin/resolutions/{{$resolution->id}}/edit?type={{$resolution->is_monitoring === 1 ? 'ME' : 'RR'}}"
                               class="btn btn-warning">
                                <i class="fa fa-edit"></i>
                                Edit
                            </a>

                            @if($isNLPEnabled && !$resolution->facebook_post_id)
                                <a id="postToFacebookButton" href="/postToFacebook/resolution/{{$resolution->id}}"
                                   class="btn btn-primary">
                                    <i class="fa fa-facebook"></i>
                                    Post to Facebook
                                </a>
                            @endif

                            <a href="{{($resolution->pdf_file_path === "" or $resolution->pdf_file_path == null) ? '#' : ("/downloadPDF/resolutions/".$resolution->pdf_file_name)}}"
                               class="btn btn-success {{($resolution->pdf_file_path === "" or $resolution->pdf_file_path == null)? 'disabled' : ''}}">
                                <i class="fa fa-download"></i>
                                Download Resolution
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-{{ $resolution->is_monitored ? '5' : '12' }}">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Resolution Number</th>
                                        <td>{{ $resolution->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Series</th>
                                        <td>{{ $resolution->series }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ str_limit($resolution->title, $limit = 150, $end = '...') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keywords</th>
                                        <td>{{ str_limit($resolution->keywords, $limit = 150, $end = '...') }}</td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                            @if($resolution->is_monitored)
                                <div class="col-md-7">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Date of Status Report</th>
                                            <td>{{ $resolution->status_report_date ? $resolution->status_report_date : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Summary</th>
                                            <td>{{ $resolution->summary ? str_limit($resolution->summary, $limit = 150, $end = '...') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{ $resolution->status ? str_limit($resolution->status, $limit = 150, $end = '...') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Legislative Action</th>
                                            <td>{{ $resolution->legislative_action ? $resolution->legislative_action : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updates</th>
                                            <td>{{ $resolution->updates ? $resolution->updates : 'N/A' }}</td>
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

    @if($resolution->is_monitoring)
        <div class="row">
            @if($resolution->is_monitoring)
                <div class="col-md-7">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            @if($resolution->pdf_link)
                                <iframe src="{{$resolution->pdf_link}}"
                                        width='100%' height='350' allowfullscreen webkitallowfullscreen></iframe>
                            @elseif($resolution->pdf_file_name)
                                <iframe src="/storage/resolutions/{{$resolution->pdf_file_name}}"
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
                            <li {{($resolution->statusReport === null or $resolution->statusReport->pdf_file_path === " ") ? "class=disabled" : ' '}}>
                                <a {{($resolution->statusReport === null or $resolution->statusReport->pdf_file_path === " ") ? ' ' : "data-toggle=tab" }} href="#update">
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
                                        <a href="/admin/resolutions/{{$resolution->id}}/upload-status-report"
                                           class="btn btn-sm btn-group btn-soundcloud {{ $resolution->questionnaire === null  ? 'disabled' : ''}}">
                                            <i class="fa fa-file-text"></i>
                                            {{($resolution->statusReport === null or  $resolution->statusReport->pdf_file_path === " ") ? 'Upload' : 'Reupload'}}
                                            Status Report
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @if($resolution->statusReport !== null and $resolution->statusReport->pdf_file_path !== " ")
                                            <table class="table table-striped table-bordered">
                                                <tr class="text-center">
                                                    <th>Status Report Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$resolution->statusReport->pdf_file_name}}</td>
                                                    <td>

                                                        <a href="/downloadPDF/statusreports/{{$resolution->statusReport->pdf_file_name}}"
                                                           class="btn btn-sm btn-primary">
                                                            Download
                                                        </a>
                                                        <a href="/deletePDF/statusreports/{{$resolution->statusReport->pdf_file_name}}"
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
                                        <a href="/admin/resolutions/{{$resolution->id}}/upload-update-report"
                                           class="btn btn-sm btn-group btn-primary ">
                                            <i class="fa fa-file-text"></i>
                                            Upload Update Report
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($resolution->updateReport()->where('is_deleted', 0)->first())
                                            <table class="table table-striped table-bordered">
                                                <tr class="text-center">
                                                    <th>Update Report Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach($resolution->updateReport()->where('is_deleted', 0)->get() as $updateReport)
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
        @if(isset($isNLPEnabled))
            <div class="col-md-3 text-center">
                <h3>Resolution Pulse </h3>
                @if(!$facebook_comments and empty($suggestions))
                    <h5><i>No comments as of yet.</i></h5>
                @else
                    <canvas id="pulseChart" width="220" height="240"></canvas>
                @endif
            </div>
        @endif

        <div class="col-md-{{ (isset($isNLPEnabled)) ? '9' : '12'}}">
            {{--<div class="row">--}}
            <div class="box box-danger color-palette-box">
                <div class="box-header with-border">
                    {{--<h3 class="box-title"><i class="fa fa-comments-o"></i> Comments/Suggestions</h3>--}}
                    @if($resolution->is_monitored === 0)
                        @if($resolution->is_accepting == 0)
                            <form style="display: inline;" method="post"
                                  action="{{ url('/admin/acceptSuggestions/' . $resolution->id.'/'.$flag) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-success pull-right">
                                    <span class="fa fa-comments-o"></span> Accept Suggestions
                                </button>
                            </form>
                        @else

                            <form style="display: inline;" method="post"
                                  action="{{ url('/admin/declineSuggestions/' . $resolution->id.'/'.$flag) }}">
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
                            @if(isset($isNLPEnabled) and $resolution->facebook_post_id !== null)
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
                            @if(empty($suggestions))
                                <h4 class="text-center">No comments as of yet.</h4>
                            @else
                                <div class="box-body box-comments">
                                    @php
                                        $counter=0;
                                    @endphp
                                    @foreach($suggestions as $suggestion)
                                        @if($counter == 3)
                                            @php
                                                break;
                                            @endphp
                                        @endif

                                        <div class="box-comment">
                                            <!-- User image -->
                                            @if($suggestion['sentiment'] === 'positive')
                                                <i class="pull-left fa fa-smile-o text-success"></i>
                                                Positive
                                            @elseif($suggestion['sentiment'] === 'negative')
                                                <i class="pull-left fa fa-minus text-danger"></i> Negative
                                            @elseif($suggestion['sentiment'] === 'neutral')
                                                <i class="pull-left fa fa-warning text-warning"></i> Neutral
                                            @else
                                                N/A
                                            @endif

                                            <div class="comment-text">
                                                  <span class="username">
                                                    {{ $suggestion['first_name'] }} {{ $suggestion['last_name'] }}
                                                      <span class="text-muted pull-right">{{ $suggestion['created_at'] }}</span>
                                                  </span><!-- /.username -->
                                                {{ $suggestion['suggestion'] }}
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        @php
                                            $counter=$counter+1;
                                        @endphp
                                    @endforeach
                                    <a href="/admin/showComments/{{$resolution->id}}/resolutions" class="pull-right">View
                                        all</a>
                                </div>
                            @endif
                        </div>

                        @if(isset($isNLPEnabled) and $resolution->facebook_post_id !== null)
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
    <script type="text/javascript">
        $('.deletePDFButton').click(function (e) {
            var link = e.target;
            var fileName = $(link).parent().parent().children().first().text();
            return confirm("Are you sure you want to delete the file " + fileName + "?");
        });

        $('#postToFacebookButton').click(function (e) {
            var link = e.target;
            return confirm("Are you sure you want to post Resolution " + "{{$resolution->number . ' series of ' . $resolution->series}}" + " to Facebook?");
        });
    </script>

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
@endsection