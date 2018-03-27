@extends('layouts.admin')

@section('styles')
    <style>
        form {
            display: inline;
        }
    </style>

@endsection

@section('content')
    <ol class="breadcrumb">
        <li><a href="/admin/pages"><i class="fa fa-file-code-o"></i> Pages</a></li>
        <li><a href="/admin/pages/{{ $page->id }}">{{ $page->id }}</a></li>
        <li class="active">Edit</li>
    </ol>

    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit {{ $page->title }}</h3>
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

            <form method="post" action="{{ url("/admin/pages/{$page->id}/") }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box-header">
                    <h3 class="box-title">Page Title</h3>
                    <div class="box-body pad">
                        <input name="title" type="text" class="form-control" placeholder="Enter ..."
                               value="{{ $page->title }}">
                    </div>
                </div>
                <div class="box-header">
                    <h3 class="box-title">Page Description</h3>
                    <div class="box-body pad">
                        <textarea name="description" class="form-control" rows="3"
                                  placeholder="Enter ...">{{ $page->description }}</textarea>
                    </div>
                </div>
                <div class="box-header">
                    <h3 class="box-title">Page Body</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools"></div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                <textarea name="content" id="editor1" name="editor1" rows="10" cols="80">
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

@section('scripts')
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')

    })


</script>


@endsection