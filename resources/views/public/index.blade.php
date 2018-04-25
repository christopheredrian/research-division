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

        .banner {
            height: 40vh;
            background-image: url("./images/about/City_hall1.JPG");
            background-size: 100% 100%;
        }

        div.folded{
            background-color:  	#ADDBE4;
        }

        div.folded h2 {
            background: #0A488D;
            background-image: radial-gradient(transparent 30%, rgba(0, 0, 0, 0.2));
            border: 0 solid rgba(0,0,0,0.2);
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            text-shadow: -1px -1px 1px rgba(0,0,0,0.2);
        }

        div.folded:before, div.folded:after {
            bottom: 26px;
            content: "";
            height: 28px;
            position: absolute;
            width: 48%;
            z-index: -1;
        }
        div.folded:before {
            left: 2%;
            transform: rotate(-3deg);
        }

        div.folded:after {
            right: 2%;
            transform: rotate(3deg);
        }

        div.folded h2 {
            border-width: 1px 1px 2px;
            margin: 0;
            padding: 4px 40px;
            position: absolute;
            right: -14px;
        }
        div.folded h2:after {
            border-width: 7px;
            border-style: solid;
            border-color: #134 transparent transparent #134;
            bottom: -15px;
            content: "";
            position: absolute;
            right: -1px;
        }

        div.folded .box {
            margin-top: 10%;
        }


        div.folded .box a{
            color: black;
        }

        div.folded .box a:hover{
            color: #2F4F4F;
        }

        @media only screen and (max-width: 425px) {
            div.box {
               margin-top: 30%;
            }
        }
    </style>

@endsection

@section('content')

    {{--slider--}}
    {{--<div id="slider" class="flexslider">--}}
        {{--<ul class="slides">--}}
            {{--<li>--}}
                {{--<img src="/images/City_hall.jpg">--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    <div class="container">
        <div class="banner"></div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 folded">
                <div class="Heading">
                    <h2>Latest Ordinances</h2>
                </div>
                <div class="box">
                    @foreach($ordinances as $ordinance)
                            <a href="/public/showOrdinance/{{$ordinance->id}}">
                                <p>{{ str_limit($ordinance->title, $limit = 80, $end = '...') }}</p>
                            </a>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-1 col-lg-1 col-md-1"></div>

            <div class="col-sm-12 col-xl-5 col-lg-5 col-md-5 folded">
                <div class="Heading">
                    <h2>Latest Resolutions</h2>
                </div>
                <div class="box">
                    @foreach($resolutions as $resolution)
                            <a href="/public/showResolution/{{$resolution->id}}">
                                <p>{{ str_limit($resolution->title, $limit = 80, $end = '...') }}</p>
                            </a>
                    @endforeach
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12">
                <h3>
                    We need your help!
                </h3>
                <h4>
                    We want to create a better city for you! We encourage you to answer our questionnaire, simply click
                    on any of the legislation currently being monitored to answer. Your inputs are highly valuable for us
                    to create better legislation for you!
                </h4>
                <br>
            </div>
        </div>

        {{-- being monitored--}}
        <div class="row">
            <div class="col-sm-12 col-xl-5 col-lg-5 col-md-5 folded">
                <div class="Heading">
                    <h2>Ordinances Currently Being Monitored</h2>
                 </div>
                <div class="box link-wrapper">
                    <div class="wrapper-15">@foreach($monitoringOrd as $ordinance)
                            <a href="/public/showOrdinance/{{$ordinance->id}}" class="hover-15">
                                <p>{{ str_limit($ordinance->title, $limit = 100, $end = '...') }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-xl-1 col-lg-1 col-md-1"></div>

            <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6 folded">
                <div class="Heading">
                    <h2>Resolutions Currently Being Monitored</h2>
                </div>
                <div class="box">
                    @foreach($monitoringRes as $resolution)
                        <a href="/public/showResolution/{{$resolution->id}}">
                            <p>{{ str_limit($resolution->title, $limit = 100, $end = '...') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>


            @if($monitoredOrdinances !== null)
            <div class="col-sm-12 col-xl-5 col-lg-5 col-md-5 folded">
                <div class="Heading center">
                    <h2>Ordinances Monitored</h2>
                </div>
                <div class="box">
                    @foreach($monitoredOrdinances as $ordinance)
                        <a href="/public/showOrdinance/{{$ordinance->id}}">
                            <p>{{ str_limit($ordinance->title, $limit = 100, $end = '...') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="col-xl-2 col-lg-2 col-md-2"></div>
            @if($monitoredResolutions !== null)
            <div class="col-sm-12 col-xl-5 col-lg-5 col-md-5 folded">
                <div class="Heading">
                    <h2>Resolutions Monitored</h2>
                </div>
                <div class="box">
                    @foreach($monitoredResolutions as $resolution)
                        <a href="/public/showResolution/{{$resolution->id}}">
                            <p>{{ str_limit($resolution->title, $limit = 100, $end = '...') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
             @endif
        </div>
    </div>
    <br>
    <br>
    <br>
    {{-- ordinances --}}
    {{--<div id="ordinance">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">--}}
                    {{--<div class="ordinance-heading">--}}
                        {{--<h2>Ordinances</h2>--}}
                        {{--<p></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<!--about wrapper left-->--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 hidden-sm col-md-5">--}}
                    {{--<div class="ordinance-left">--}}
                        {{--<img src="https://c1.staticflickr.com/8/7347/27219912311_12ebb667a2_b.jpg" alt="">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!--about wrapper right-->--}}
                {{--<div class="col-xs-12 col-md-7">--}}
                    {{--<div class="ordinance-right">--}}
                        {{--@foreach($ordinances as $ordinance)--}}
                            {{--<div class="ordinance-right-wrapper">--}}
                                {{--<a href="/public/showOrdinance/{{$ordinance->id}}">--}}
                                    {{--<p>{{ str_limit($ordinance->title, $limit = 100, $end = '...') }}</p>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<br/>--}}
                        {{--@endforeach--}}

                        {{--<div class="ordinance-right-wrapper"></div>--}}

                        {{--<div class="pull-right">--}}
                            {{--<div class="ordinance-right-wrapper">--}}
                                {{--<button onclick="window.location.href='/ordinances'" class="btn btn-info button-two"><span>View All</span>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div id="ordinance">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">--}}
                    {{--<div class="ordinance-heading">--}}
                        {{--<h2>Resolutions</h2>--}}
                        {{--<p></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<!--about wrapper left-->--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 hidden-sm col-md-5">--}}
                    {{--<div class="ordinance-left">--}}
                        {{--<img src="https://c1.staticflickr.com/8/7347/27219912311_12ebb667a2_b.jpg" alt="">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!--about wrapper right-->--}}
                {{--<div class="col-xs-12 col-md-7">--}}
                    {{--<div class="ordinance-right">--}}
                        {{--@foreach($resolutions as $resolution)--}}
                            {{--<div class="ordinance-right-wrapper">--}}
                                {{--<a href="/public/showResolution/{{$resolution->id}}">--}}
                                    {{--<p>{{ str_limit($resolution->title, $limit = 100, $end = '...') }}</p>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<br/>--}}
                        {{--@endforeach--}}
                        {{--<div class="pull-right">--}}
                            {{--<div class="ordinance-right-wrapper">--}}
                                {{--<button onclick="window.location.href='/resolutions'" class="btn btn-info button-two"><span>View All</span>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <br>
@endsection

@section('scripts')
@endsection
