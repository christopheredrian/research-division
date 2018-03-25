@extends('layouts.admin')


@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create new user</h3>
            </div>
            <div class="box-body">
                {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
            {{--@endif--}}
{{--                {{dd(old())}}--}}
            <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ url('/admin/users/') }}">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Name</label>
                            <input name="name" type="text" class="form-control"
                                   placeholder="Enter name" value="{{ old('name') }}">
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{$errors->has('role') ? 'has-error' : ''}}">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="">Please select..</option>
                                <option value="admin" {{ (old('role') == 'admin') ? 'selected' : ''}} >Admin</option>
                                <option value="rr" {{ (old('role') == 'rr') ? 'selected' : ''}}>Research and Records</option>
                                <option value="me" {{ (old('role') == 'me') ? 'selected' : ''}}>Monitoring and Evaluation</option>
                            </select>
                            {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
                        </div>


                        <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                            <label for="pass">Password</label>
                            <input name="pass" type="password" class="form-control"
                                   placeholder="Enter Password" value="{{ old('pass') }}">
                            {{--{{dd(old('password'))}}--}}
                            {!! $errors->first('pass', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{$errors->has('repassword') ? 'has-error' : ''}}">
                            <label for="repassword">Re-enter Password</label>
                            <input name="repassword" type="password" class="form-control"
                                   placeholder="Re enter password" value="{{ old('repassword') }}">
                            {!! $errors->first('repassword', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="email">Email address</label>
                            <input name="email" type="z" class="form-control"
                                   placeholder="Enter email" value="{{ old('email')}}">
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="pull-right btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.box -->

    </div>
    <div class="col-md-2"></div>
@endsection