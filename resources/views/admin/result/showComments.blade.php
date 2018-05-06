@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

    <style>
        ul.answer-values > li {
            list-style: none;
            font-size: 15px;
        }

        ul.answer-values {
            height: 200px;
            overflow-y: scroll;
        }

        div.box-primary {
            padding: 5%;
        }

        div.question-print, .rd-header, .code-container {
            display: none;
        }

        @media print {
            .box-header, ul.nav-tabs, .highcharts-button {
                display: none;
            }

            rect.highcharts-container {
                width: 40%;
                height: 50%;
            }

            ul.answer-values {
                display: none;
                overflow: hidden;
            }

            div.question-print {
                display: block;
            }

            .rd-header {
                display: block;
            }
        }

        .fa.fa-print {
            margin-right: 5px;
        }

        a.print {
            text-decoration: none;
            display: inline-block;
            width: 100px;
            margin: 20px auto;
            background: #dc143c;
            background: linear-gradient(#e3647e, #DC143C);
            text-align: center;
            color: #fff;
            padding: 3px 6px;
            border-radius: 3px;
            border: 1px solid #e3647e;
        }

        a.print:hover {
            background: linear-gradient(#DC143C, #e3647e);
            color: #fff;
        }
    </style>

@endsection

@section('content')
    <ol class="breadcrumb">
        @if($flag == 'ordinances')
            <li class="active">
                <i class="fa fa-comments-o"></i> Comments for Ordinance {{$legislation_number}} - Series of  {{$series}}
            </li>
        @else
            <li class="active">
                <i class="fa fa-comments-o"></i> Comments for Resolution {{$legislation_number}} - Series of  {{$series}}
            </li>
        @endif
    </ol>

    <div class="box box-default color-palette-box">
        {{--<div class="box-header with-border">--}}
        {{--<h3 class="box-title"><i class="fa fa-comments-o"></i> Comments</h3>--}}
        {{--<a href="/admin/downloadComments/{{$pass_id}}/{{$flag}}" class="btn btn-success btn-md pull-right">--}}
        {{--<span class="fa fa fa-file-excel-o"> </span> Download Excel--}}
        {{--</a>--}}
        {{--</div>--}}

        <div class="box-body">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#system"><i class="fa fa-comments-o"></i> System Comments</a>
                </li>

                <li>
                    <a data-toggle="tab" href="#facebook"><i class="fa fa-facebook-f"></i> Facebook Comments</a>
                </li>
                <a href="/admin/downloadComments/{{$pass_id}}/{{$flag}}" class="btn btn-success btn-md pull-right">
                    <span class="fa fa fa-file-excel-o"> </span> Download Excel
                </a>
            </ul>
        </div>

        <div class="box-body">
            <div class="tab-content">
                <div id="system" class="tab-pane fade in active">
                    <table id="systemDataTable" class="table table-hover dt-bootstrap">
                        <thead>
                        <tr>
                            <th>Sentiment</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Suggestion</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suggestions as $suggestion)
                            <tr>
                                <td>
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
                                </td>

                                <td>{{ $suggestion['first_name'].' '.$suggestion['last_name']}}</td>
                                <td>{{ $suggestion['email'] }}</td>
                                <td><a href="" class="update" data-url="{{ url('/admin/updateComment/') }}"
                                       data-name="name"
                                       data-type="text" data-pk="{{$suggestion['id']}}"
                                       data-title="Enter answer">{{ $suggestion['suggestion']}}
                                    </a></td>
                                <td>{{ $suggestion['created_at'] }}</td>
                                <td><a class="delete-modal text-danger" data-id="{{$suggestion['id']}}"
                                       data-suggestion="{{$suggestion['suggestion']}}">
                                        <button class="btn btn-xs btn-danger btn-equal-width ">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @if(isset($isNLPEnabled))
                    <div id="facebook" class="tab-pane fade">
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

        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Are you sure you want to delete this comment?</h3>
                        <br/>
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_delete" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="suggestion">Comment:</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="suggestion_delete" disabled>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                <span id="" class='glyphicon glyphicon-trash'></span> Delete
                            </button>
                            <button type="button" class="btn" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <script type="text/javascript" src="/DataTables/datatables.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

            <script>
                $(document).ready(function () {
                    $('#dataTable').DataTable();
                });
            </script>

            <script>
                $(document).ready(function () {
                    $('#systemDataTable').DataTable();
                });
            </script>

            <script>
                //        $.fn.editable.defaults.send = "always";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //                $.fn.editable.defaults.mode = 'inline';
                $(function () {
                    $('.update').editable({
                        params: function (params) {
                            // add additional params from data-attributes of trigger element
//                    params._token = $("#_token").data("token");
                            params.name = $(this).editable().data('name');
                            return params;
                        },
                        validate: function (value) {
                            if ($.trim(value) == '')
                                return 'This field is required';
                        },
                        title: 'Enter answer'
                    });
                });
                $(function () {
                    $('.update').editable.editable('validate');
                });

                $(document).on('click', '.delete-modal', function () {
                    $('.modal-title').text('Delete');
                    $('#id_delete').val($(this).data('id'));
                    $('#suggestion_delete').val($(this).data('suggestion'));
                    $('#deleteModal').modal('show');
                    id = $('#id_delete').val();
                });
                $('.modal-footer').on('click', '.delete', function () {
                    $.ajax({
                        type: 'DELETE',
                        url: '/admin/deleteComment/' + id,
                        data: {
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function (data) {
//                    toastr.success('Successfully deleted Post!', 'Success Alert', {timeOut: 5000});
                            console.log(data);
                            $('#item' + data['id']).remove();
                        },
                        error: function (data) {
                            var errors = data.responseJSON;
                            console.log(errors);
                            // Render the errors with js ...
                        }
                    });
                });
            </script>
@endsection