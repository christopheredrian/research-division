@extends('layouts.public')
@section('styles')
    <style>
        .ordinance-right-wrapper h3 {
            font-size: 20px;
        }
    </style>
@endsection
@section('content')
    <!--slider-->
    <div id="slider" class="flexslider">

        <ul class="slides">
            <li>
                <img src="/images/slider/slider4.jpg">

                <div class="caption">
                    <h2><span>NEW! Ordinance for Urban Gardening</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
            <li>
                <img src="/images/slider/slider5.jpg">

                <div class="caption">
                    <h2><span>No Smoking Ordinance</span></h2>
                    <h1><span>PUBLISHED</span></h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
            <li>
                <img src="/images/slider/slider6.jpg">

                <div class="caption">
                    <h2><span>No Jaywalking Ordinance.</span></h2>
                    <h1><span>Jaywalking is now prohibited!</span></h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
        </ul>

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
                        <img src="/images/about/books.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        <div class="ordinance-right-heading">
                            <h1>Recent Resolutions</h1>
                        </div>
                        @foreach($resolutions as $resolution)

                            <div class="ordinance-right-wrapper">
                                <a href="/public/showResolution/{{$resolution->id}}">
                                    <h3>{{ str_limit($resolution->title, $limit = 100, $end = '...') }}</h3>
                                </a>
                                {{--<p>{{ str_limit($resolution->description, $limit = 100, $end = '...') }}</p>--}}
                            </div>
                            <br/>
                        @endforeach
                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/resolutions'" class="btn btn-info">View All
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
                        <img src="/images/about/books.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        <div class="ordinance-right-heading">
                            <h1>Recent Ordinances</h1>
                        </div>
                        @foreach($ordinances as $ordinance)
                                <div class="ordinance-right-wrapper">
                                    <a href="/public/showOrdinance/{{$ordinance->id}}">
                                        <h3>{{ str_limit($ordinance->title, $limit = 100, $end = '...') }}</h3>
                                    </a>
                                </div>
                            <br/>
                        @endforeach

                        <div class="ordinance-right-wrapper"></div>

                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/ordinances'" class="btn btn-info">View All
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