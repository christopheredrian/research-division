@extends('layouts.app')
    @section('styles')
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">

        <style type="text/css" rel="stylesheet">
            span.message {
                position: absolute;
                top: 20%;
            }

            .top-line {
                font-size: 20px;
            }

            .mid-line {
                font-size: 20px;
                font-weight: bold;
            }

            .bottom-line {
                font-size: 15px;
            }

            div.contents {
                top: 20%;
            }

            div.line {
                height: 10px;
                width: 100%;
                border-bottom: 1px solid black;
            }

            img {
                width: 15%;
            }
        </style>
        @endsection
    @section('content')
        <hr size="30">
        {{-- content --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <img class="col-sm-2" src="/images/client/Seal_of_baguio_city.png" alt="Seal_of_baguio_city">
                        <span class="message col-sm-10">
                            <span class="top-line"> Republic of the Philippines  </span><br>
                            <span class="mid-line"> OFFICE OF THE SANGGUNIANG PANLUNGSOD (CITY COUNCIL) </span><br>
                            <span class="bottom-line"> City Government of Baguio </span>
                        </span>
                    </div>
                </div>
            </div>
                <div class="contents col-lg-12">
                    <br>
                    <div class="line"></div><br><br>
                    <p> Ordinance No.
                        {{ $ordinance->number }},
                        series of
                        {{ $ordinance->series }},
                        "{{ $ordinance->title }}". </p>
                    <h2> {{$questionnaire->name}} </h2>

                    {{--{{$questionnaire->description}}--}}

                    @php
                        $counter = 1;
                    @endphp
                    <br>
                    <label for="firstname">First Name</label>
                    <input name="firstname" type="text" class="form-control" {{$required == 1 ? 'required' : ''}}>
                    <label for="lastname">Last Name</label>
                    <input name="lastname" type="text" class="form-control" {{$required == 1 ? 'required' : ''}}>
                    <label for="email">E-mail</label>
                    <input name="email" type="text" class="form-control" {{$required == 1 ? 'required' : ''}}>
                    <br>

                    @foreach($questions as $question)
                        <div class="form-group">
                            <label for="answer">{{$counter.'. '.$question->question}}</label>
                            @if($question->type == 'short')
                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                       id="answer" value="{{$question->id}}">
                                {{--<input name="answer{{$counter}}" type="text" class="form-control" id="answer" {{$question->required == 1 ? 'required' : ''}}>--}}
                                <textarea class="form-control" rows="5" id="answer" name="answer{{$counter}}" {{$question->required == 1 ? 'required' : ''}}></textarea>
                            @endif
                            @if($question->type == 'long')
                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                       id="answer" value="{{$question->id}}">
                                <textarea class="form-control" rows="5" id="answer" name="answer{{$counter}}" {{$question->required == 1 ? 'required' : ''}}></textarea>
                            @endif
                            @if($question->type == 'radio')
                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                       id="answer" value="{{$question->id}}">
                                @foreach($values as $value)
                                    @if($value->question_id == $question->id)
                                        <div class="radio">
                                            <label><input id="answer" type="radio" name="answer{{$counter}}" value="{{$value->value}}" {{$question->required == 1 ? 'required' : ''}}>{{$value->value}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            @if($question->type == 'checkbox')
                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                       id="answer" value="{{$question->id}}">
                                @foreach($values as $value)
                                    @if($value->question_id == $question->id)
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="answer{{$counter}}" value="{{$value->value}}" {{$question->required == 1 ? 'required' : ''}}>{{$value->value}}</label>
                                        </div>
                                        @php
                                            $counter=$counter+1;
                                        @endphp
                                    @endif
                                @endforeach
                            @endif

                            @if($question->type == 'conditional')
                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                       id="answer" value="{{$question->id}}">
                                @php
                                    $count=0;
                                @endphp

                                @foreach($values as $value)
                                    @if($value->question_id == $question->id)
                                        @php
                                            $split=explode(";",$value->value.";");
                                            $count=$count+1;
                                        @endphp
                                        <div class="radio">
                                            <label><input id="watch-me{{$count}}" onclick="show{{$count}}({{$counter}})" type="radio" name="answer{{$counter}}" value="{{$split[0]}}" {{$question->required == 1 ? 'required' : ''}}>{{$split[0]}}</label>
                                        </div>
                                        @if($split[1]==="1")
                                            <div id='show-me{{$count}}-{{$counter}}' style='display:none'>
                                                <textarea class="form-control" rows="5" id="answer" placeholder="Why?" name="{{$count}}conditionalAnswer{{$counter}}" {{$question->required == 1 ? 'required' : ''}}></textarea>
                                            </div>
                                        @else
                                            <div id='show-me{{$count}}-{{$counter}}' style='display:none'>
                                            </div>
                                        @endif

                                    @endif
                                @endforeach
                            @endif

                            @php
                                $counter = $counter+1;
                            @endphp
                        </div>
                @endforeach

                </div>
            </div>
                <script type="text/javascript">
                    window.print();
                </script>
    @endsection

