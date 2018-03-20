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
    </ol>

    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-text"></i>
                Messages
                <small>Messages from the Contact Us page</small>
            </h3>

        </div>
        <div class="box-body">

            <form action="#" method="get" class="pull-right col-md-4">
                <div class="input-group">
                    <input value="{{ request()->q }}" type="text" name="q" class="form-control"
                           placeholder="Search...">
                    <span class="input-group-btn">
                                   <button type="submit" id="search-btn" class="btn btn-flat">
                                     <i class="fa fa-search"></i>
                                   </button>
                                </span>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Timestamp</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->name}}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject  }}</td>
                            <td>{{ str_limit($message->message, $limit = 150, $end = '...') }}</td>
                            <td>{{ $message->created_at }}</td>
                            <td><a class="btn btn-info" href="/admin/messages/{{ $message->id }}">Full Message</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row text-center">
                    {{$messages->links()}}
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

