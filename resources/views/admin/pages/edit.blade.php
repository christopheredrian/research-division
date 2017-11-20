@extends('layouts.admin')

@section('styles')
    <style>
        form {
            display: inline;
        }
    </style>

@endsection

@section('content')
    <div class="box box-default color-palette-box">
    <div class="box-header with-border">
                <h3 class="box-title">Edit {{ $page->title }}</h3>
            </div>
    <div class="box-body">
        <div>
            <a href="/admin/pages" class="btn btn-info">Back</a>

        </div>
        <form method="post" action="{{ url("/admin/pages/{$page->id}/") }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
            <div class="box-header">
                <h3 class="box-title">Page Title
                </h3>
                <div class="box-body pad">
                    <input name="title" type="text" class="form-control" placeholder="Enter ..." value="{{ $page->title }}">
                </div>
            </div>
            <div class="box-header">
                <h3 class="box-title">Page Description
                </h3>
                <div class="box-body pad">
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{ $page->description }}</textarea>
                </div>
            </div>
            <div class="box-header">
                <h3 class="box-title">Page Body
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea name="content" id="editor1" name="editor1" rows="10" cols="80" >
                    {{ $page->content }}
                    </textarea>
            </div>
            <div class="box-footer">
                    <button type="submit" class="pull-right btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
</div>
@endsection