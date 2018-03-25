@extends('layouts.public')

@section('styles')
    <style>
        .ordinance-right-wrapper p {
            font-size: 20px;
        }

        .button-two {
            border-radius: 4px;
            border: none;
            transition: all 0.5s;
        }

        .button-two span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button-two span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button-two:hover span {
            padding-right: 25px;
        }

        .button-two:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
@endsection

@section('content')
    {{--slider--}}
    <div id="slider" class="flexslider">
        <ul class="slides">
            <li>
                <img src="/images/slider/slider4.jpg">

                {{--<div class="caption">--}}
                    {{--<h2><span>NEW! Ordinance for Urban Gardening</span></h2>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                    {{--<button class="btn">Read More</button>--}}
                {{--</div>--}}
            </li>
            <li>
                <img src="/images/slider/slider5.jpg">
                {{--<div class="caption">--}}
                    {{--<h2><span>No Smoking Ordinance</span></h2>--}}
                    {{--<h1><span>PUBLISHED</span></h1>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                    {{--<button class="btn">Read More</button>--}}
                {{--</div>--}}
            </li>
            <li>
                <img src="/images/slider/slider6.jpg">
                {{--<div class="caption">--}}
                    {{--<h2><span>No Jaywalking Ordinance.</span></h2>--}}
                    {{--<h1><span>Jaywalking is now prohibited!</span></h1>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                    {{--<button class="btn">Read More</button>--}}
                {{--</div>--}}
            </li>
        </ul>
    </div>

    <div id="ordinance">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="ordinance-heading">
                        <h2>Ordinances</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <!--about wrapper left-->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <div class="ordinance-left">
                        <img src="/images/about/law.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        @foreach($ordinances as $ordinance)
                            <div class="ordinance-right-wrapper">
                                <a href="/public/showOrdinance/{{$ordinance->id}}">
                                    <p>{{ str_limit($ordinance->title, $limit = 100, $end = '...') }}</p>
                                </a>
                            </div>
                            <br/>
                        @endforeach

                        <div class="ordinance-right-wrapper"></div>

                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/ordinances'" class="btn btn-info button-two"><span>View All</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ordinance">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="ordinance-heading">
                        <h2>Resolutions</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <!--about wrapper left-->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <div class="ordinance-left">
                        <img src="/images/about/law.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        @foreach($resolutions as $resolution)
                            <div class="ordinance-right-wrapper">
                                <a href="/public/showResolution/{{$resolution->id}}">
                                    <p>{{ str_limit($resolution->title, $limit = 100, $end = '...') }}</p>
                                </a>
                            </div>
                            <br/>
                        @endforeach
                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/resolutions'" class="btn btn-info button-two"><span>View All</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
@endsection