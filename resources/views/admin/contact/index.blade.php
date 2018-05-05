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
                            <td><a class="btn btn-info" href="/admin/messages/{{ $message->id }}">Full Message</a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$message->id}}">
                                Delete
                                </a></td>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$message->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Confirm Delete</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete {{$message->subject}}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <form action="/admin/messages/{{ $message->id }}" method="post">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row text-center">
                    {{$messages->appends(['q' => request()->q])->links()}}
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

