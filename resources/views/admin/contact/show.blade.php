@extends('layouts.admin')

@section('styles')
    <style>
        form {
            display: inline;
        }

        .btn-equal-width {
            margin: 0 auto;
            width: 57px;
        }

        .add-magin {
            margin: 10px 0;
        }
    </style>
@endsection

@section('content')

    <ol class="breadcrumb">
        <li><a href="/admin/messages"><i class="fa fa-book"></i> Messages</a></li>
        <li><a href="/admin/messages{{ $message->id }}">Query by {{ $message->name }}</a></li>
    </ol>

    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-text"></i>
                Messages
                <small>Message from {{ $message->name }}</small>
            </h3>

        </div>
        <div class="box-body">


        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <td>{{ $message->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $message->email}}</td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <td>{{ $message->message}}</td>
                    </tr>
                    <tr>
                        <th>Timestamp</th>
                        <td>{{ $message->created_at }}</td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection

