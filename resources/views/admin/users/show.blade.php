@extends('layouts.admin')
@section('title')
    Profile
@endsection

@section('content')

    @if(Auth::user()->id == $user->id)
        <ol class="breadcrumb">
            <li><i class="fa fa-user"></i> Profile</li>
        </ol>
    @else
        <ol class="breadcrumb">
            <li><a href="/admin/users"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">{{ $user->id }}</li>
        </ol>
    @endif
<div class="col-md-1"></div>
    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Profile</h3>
            </div>
            <div class="box-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <table class="table table-borderless">
                    <tr>
                        <div style="text-align: center">
                            @if($user->image != null)
                                <img src="{{ session('profile_image_link') }}"
                                     class="img-circle" style="max-width: 2in; border: dashed"
                                     alt="User Image">
                            @else
                                <img src="/uploads/default.jpg" class="img-circle"
                                     style="max-width: 2in; border: dashed" alt="User Image">
                            @endif
                            <br/><br/>
                        </div>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ Auth::user()->role }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                </table>
            </div>

            <div class="box-footer">
                <a href="/admin/profile/edit" class="pull-right btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>


@endsection
