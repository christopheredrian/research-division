@extends('layouts.admin')
@section('styles')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Reports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="" >
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="series">Natural Language Processing Features</label>
                                    <input name="is_NLP_enabled" type="hidden" id="is_NLP_enabled">
                                    <label class="switch pull-right">
                                        <input id="toggleConfigurationButton" type = "checkbox">
                                        <span class="slider round"></span>
                                    </label>
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
@endsection

@section('scripts')
    <script>
        $("#toggleConfigurationButton").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            e.preventDefault();

            $.ajax({

                type: 'POST',
                url: '/toggleConfiguration',
                data: {
                    _token: '{{csrf_token()}}'
                },
//                dataType: 'json',
                success: function (data) {
                    alert('success');

//                    var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
//                    task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
//                    task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';
//
//                    if (state == "add"){ //if user added a new record
//                        $('#tasks-list').append(task);
//                    }else{ //if user updated an existing record
//
//                        $("#task" + task_id).replaceWith( task );
//                    }
//
//                    $('#frmTasks').trigger("reset");
//
//                    $('#myModal').modal('hide')
                },
                error: function (data) {
                    alert('error');
                }
            });
        });
    </script>
@endsection