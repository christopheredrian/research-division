@extends('layouts.pub2')
@section('content')
    <section id="business-growth-p1" class="business-growth-p1 bg-gradiant">
        <div class="container bg-white">
            <div class="row title-bar">
                <div class="col-md-12">
                    <h1 class="wow fadeInUp">Resolution {{ $resolution->number }}</h1>
                    <div class="heading-border"></div>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">
                        {{$resolution->title}}
                    </p>
                </div>

                <div class="col-md-7">

                    @if($resolution->pdf_link)
                        <div class="service-himg">
                            <iframe src="{{$resolution->pdf_link}}"
                                    width='100%' height='400' allowfullscreen
                                    webkitallowfullscreen></iframe>
                        </div>
                    @else
                        <div style="padding: 10px; border: dashed #60b4e8">
                            <h3 class="text-center">PDF not available.</h3>
                        </div>
                    @endif
                </div>

                <div class="col-md-5">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            @if($resolution->is_monitoring == 1)
                                @if($resolution->statusReport !== null and $resolution->statusReport->pdf_file_path !== " ")
                                    <a href="/downloadPDF/statusreports/{{$resolution->statusReport->pdf_file_name}}">
                                        <button class="btn-sm btn-info">
                                            Download Status Report
                                        </button>
                                    </a>
                                @endif

                                {{--<a href="">--}}
                                {{--<button class="btn-sm btn-info">--}}
                                {{--View Updates--}}
                                {{--</button>--}}
                                {{--</a>--}}

                                @if(!$questionnaire->isEmpty())
                                    <a href="/answer.r/{{$resolution->id}}">
                                        <button class="btn-sm btn-success">
                                            Answer Questionnaire
                                        </button>
                                    </a>
                                @endif

                            @endif
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Resolution Number</th>
                                    <td>{{ $resolution->number }}</td>
                                </tr>
                                <tr>
                                    <th>Series</th>
                                    <td>{{ $resolution->series }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $resolution->title }}</td>
                                </tr>
                                <tr>
                                    <th>Keywords</th>
                                    <td>{{ $resolution->keywords }}</td>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            @if($resolution->updateReport()->where('is_deleted', 0)->first())
                <div class="col-md-5">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            Updates
                            @foreach($resolution->updateReport()->where('is_deleted', 0)->get() as $updateReport)
                                <tr>
                                    <td>{{$updateReport->pdf_file_name}}</td>
                                    <td>
                                        <a href="/downloadPDF/updatereports/{{$updateReport->pdf_file_name}}"
                                           class="btn btn-xs btn-primary btn-equal-width pull-right">
                                            Download
                                        </a>
                                    </td>
                                </tr>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if($resolution->is_accepting == 1)
                {{--<a href="">--}}
                {{--<button class="btn-sm btn-success">--}}
                {{--Give Comment--}}
                {{--</button>--}}
                {{--</a>--}}
                <div class="container"
                     style="border-top: dashed lightseagreen; padding-top: 20px">
                    @if(Session('flash_message'))

                        <p class="alert alert-success">{{ Session('flash_message') }}</p>

                    @endif
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="container bg-gray" style="padding: 20px 20px 10px 20px">
                                <form id="comment-resolution" method="post"
                                      action="{{ url("/suggestions/{$resolution->id }/") }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="first_name"
                                               placeholder="First Name" value="{{ old('first_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="last_name"
                                               placeholder="Last Name" value="{{ old('last_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="type"
                                               value="resolution">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email"
                                               placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea required class="form-control" name="suggestion"
                                                  rows="5"
                                                  placeholder="Please give us your suggestion on this resolution">{{ old('suggestion') }}</textarea>
                                    </div>

                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                            </span>
                                    @endif

                                    <div class="form-group">
                                        <div class="submit col-md-12 sub-but text-center">
                                            <button class="btn btn-success" type="submit" onclick="submitform('comment-resolution')">
                                                <i
                                                        class="fa fa-paper-plane"></i> Send Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
        </div>
    </section>
@endsection