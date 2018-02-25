@extends('layouts.admin')

@section('scripts')
    <script src="public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function () {


        })

    </script>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-wrench"></i> System Logs</h3>
        </div>

        <div class="box-body">
            <form action="">
                <div class="form-group">
                    <label>Date range button:</label>

                    <div class="row">
                        <div class='col-sm-6'>
                            <input type='text' class="form-control" id='datetimepicker4' />
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker4').datetimepicker();
                            });
                        </script>
                    </div>
                </div>

            </form>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Message</th>
                    <th>Ip</th>
                    <th>Timestamp</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->user }}</td>
                        <td>{{ $log->message }}</td>
                        <td>{{ $log->ip }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $logs->links() }}
        </div>
    </div>
@endsection