@extends('layouts.admin')

@section('scripts')
  
@endsection

@section('content')
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-wrench"></i> Logs</li>
    </ol>

    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-wrench"></i> System Logs</h3>
        </div>

        <div class="box-body">
            <div class="well" style="text-align: center">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="exampleInputName2">From</label>
                        <input name="from" type="date" class="form-control" value="{{ request('from') ? request('from') : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">To</label>
                        <input name="to" type="date" class="form-control" value="{{ request('to') ? request('to') : '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Message</th>
                    <th>Ip</th>
                    <th>Timestamp</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    @if($log->user == "aa@example.com")
                    @else
                        <tr>
                            <td>{{ $log->user }}</td>
                            <td>{{ $log->message }}</td>
                            <td>{{ $log->ip }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{ $logs->links() }}
        </div>
    </div>
@endsection