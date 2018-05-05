@extends('layouts.pub2')
@section('content')

    <!--====================================================
                          BUSINESS-GROWTH-P1
    ======================================================-->

    <section id="business-growth-p1" class="business-growth-p1 bg-gradiant">
        <div class="container bg-white">
            <div class="row title-bar">
                <div class="col-md-12">
                    <h1 class="wow fadeInUp">Ordinance {{ $ordinance->number }}</h1>
                    <div class="heading-border"></div>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">
                        {{$ordinance->title}}
                    </p>
                </div>
                <div class="col-md-7">

                    @if($ordinance->pdf_link)
                        <div class="service-himg">
                            <iframe src="{{$ordinance->pdf_link}}"
                                    width='100%' height='350' allowfullscreen="" webkitallowfullscreen
                                    frameborder="1"></iframe>
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
                            @if($ordinance->is_monitoring == 1)
                                @if($ordinance->statusReport !== null and $ordinance->statusReport->pdf_file_path !== " ")
                                    <a href="/downloadPDF/statusreports/{{$ordinance->statusReport->pdf_file_name}}">
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
                                    <a href="/answer.o/{{$ordinance->id}}">
                                        <button class="btn-sm btn-success">
                                            Answer Questionnaire
                                        </button>
                                    </a>
                                @endif


                            @endif

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Ordinance Number</th>
                                    <td>{{ $ordinance->number }}</td>
                                </tr>
                                <tr>
                                    <th>Series</th>
                                    <td>{{ $ordinance->series }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $ordinance->title }}</td>
                                </tr>
                                <tr>
                                    <th>Keywords</th>
                                    <td>{{ $ordinance->keywords }}</td>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                @if($ordinance->updateReport()->where('is_deleted', 0)->first())
                    <div class="col-md-5">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                Updates
                                <table class="table table-striped table-bordered">
                                    <tr class="text-center">
                                        <th>Update Report Name</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($ordinance->updateReport()->where('is_deleted', 0)->get() as $updateReport)
                                        <tr>
                                            <td>{{$updateReport->pdf_file_name}}</td>
                                            <td>
                                                <a href="/downloadPDF/updatereports/{{$updateReport->pdf_file_name}}"
                                                   class="btn btn-xs btn-primary">
                                                    Download
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if($ordinance->is_accepting == 1)
                <div class="container"
                     style="border-top: dashed lightseagreen; padding-top: 20px">
                    @if(Session('flash_message'))

                        <p class="alert alert-success">{{ Session('flash_message') }}</p>

                    @endif
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="container bg-gray" style="padding: 20px 20px 10px 20px">
                            <form id="comment-ordinance" method="post" action="{{ url("/suggestions/{$ordinance->id }/") }}"
                                  class="form">
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
                                    <input class="form-control" type="hidden" name="type" value="ordinance">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email"
                                           value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                <textarea id="message" required class="form-control" name="suggestion" rows="5"
                                          placeholder="Please give us your suggestion on this ordinance"
                                          required>{{ old('suggestion') }}</textarea>
                                </div>


                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                @endif


                                <div class="form-group">
                                    <div class="submit col-md-12 sub-but text-center">
                                        <button class="btn btn-success" type="submit" onclick="submitform('comment-ordinance')">
                                            <i
                                                    class="fa fa-paper-plane"></i> Send Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection