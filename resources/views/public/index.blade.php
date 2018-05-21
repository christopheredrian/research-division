@extends('layouts.pub2')

@section('styles')
    <style type="text/css">
        #hero {
            content-align: center;
        }

        .lower {
            margin-top: 10vh;
        }

        .top {
            margin-top: 5vh;
        }
    </style>
    @endsection
@section('content')

    <section class="home">
        <section id="home">
            <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel"></div>
        </section>

    {{-- NEW LAYOUT --}}
    <div class="container-fluid">
        {{-- upper part --}}
    <div class="top row">
        {{-- Q2 --}}
        <div class="col col-lg-6 col-xs-12">
                    <hgroup class="wow fadeInUp text-center">
                        <h1>Let's Work together!</h1>
                        <h1>We need your <span>
                                    <a href="" class="typewrite" data-period="2000"
                                       data-type='[ " Participation", " Opinion"]'>
                        <span class="wrap"></span></a></span></h1>
                    </hgroup>
            <div class="wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-h-desc">
                    <p style="text-align: justify">
                        The Sanggunian is pursuing its monitoring of the implementation or enforcement of ordinances
                        and resolutions enacted by the body. This is being conducted because the legislative body is
                        not only tasked to enact new legislations, but it also has a duty to ensure that existing
                        legislations are implemented and administered efficiently, effectively, and in a manner
                        consistent with its legislative intent.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                    <h2> Questionnaires
                        <a href="/forms">
                            <span class="badge badge-info">
                                {{ $questionnaires->count() }}
                            </span>
                        </a>
                    </h2>
                    <div class="owl-carousel owl-theme">
                        @foreach($questionnaires as $item)
                            @if($item->ordinance)
                                <div class="item">
                                    <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                                        <a href="/answer.o/{{ $item->ordinance->id }}">
                                        <div class="desc-comp-offer-cont" style="text-align: center">
                                            <div class="bg-chathams" style="padding: 20px">
                                                <h5 style="color: white">Ordinance No. {{$item->ordinance->number}}</h5>
                                            </div>
                                            <p class="desc" style="margin-top: 10px;">
                                                {!! Str::words($item->ordinance->title, 30,'...')  !!}
                                            </p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            @elseif($item->resolution)
                                <div class="item">
                                    <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                                        <a href="/answer.r/{{ $item->resolution->id }}">
                                            <div class="desc-comp-offer-cont" style="text-align: center">
                                                <div class="bg-chathams" style="padding: 20px">
                                                    <h5 style="color: white">Resolution No. {{$item->resolution->number}}</h5>
                                                </div>
                                                <p class="desc" style="margin-top: 10px;">
                                                    {!! Str::words($item->resolution->title, 30,'...')  !!}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Q1 --}}
        <div class="col-lg-6 col-xs-12">
            <div>
                <h2> Why do we conduct Monitoring and Evaluation? </h2>
                <p style="text-align: justify">
                        The Sangguniang Panlungsod ng Baguio conducts monitoring on the implementation and enforcement
                    of the legislations already enacted by the Sanggunian, because it determines the effectiveness or
                    non-effectiveness and the implementation and non-implementation of these legislations in order that
                    necessary ammendments, if any, may be introduced. Quality legislation is more likely to be realized
                    when a legislative measure/action has the capability to address the needs and aspirations of a
                    target group.
                </p>
                <p style="text-align: justify">
                    That is why we request the suggestions, recommendations, or comments coming from the public, as to
                    how we could strengthen and improve the implementation and enforcement of the legislations and uphold
                    the welfare of the citizens of Baguio.
                    </p>
            </div>
        </div>
    </div>

    {{-- lower part --}}
    <div class="row lower">
        <div class="col-lg-6 col-xs-12">

            <section class="what-we-do bg-gradiant">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="text-center">
                             LATEST LEGISLATIONS
                        </h2>
                    </div>
                </div>
            </section>
            <br>

            <div class="row">
                {{--HORIZONTAL BAR--}}
                <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                    <h2>Latest ordinances</h2>
                    <div class="heading-border-light"></div>
                </div>
                <div class="owl-carousel owl-theme">
                    @foreach($ordinances as $ordinance)
                        <div class="item">
                            <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                                <div class="desc-comp-offer-cont" style="text-align: center">
                                    <div class="bg-chathams" style="padding: 20px">
                                        <h5 style="color: white">Ordinance No. {{$ordinance->number}}</h5>
                                    </div>
                                    <p class="desc" style="margin-top: 10px;">
                                        {!! Str::words($ordinance->title, 30,'...')  !!}
                                    </p>
                                    <a href="/public/showOrdinance/{{$ordinance->id}}"><i
                                                class="fa fa-arrow-circle-o-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <br/>

            <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                <h2>Latest Resolutions</h2>
                <div class="heading-border-light"></div>
            </div>
            <div class="owl-carousel owl-theme">
                @foreach($resolutions as $resolution)
                    <div class="item">
                        <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                            <div class="desc-comp-offer-cont" style="text-align: center">
                                <div class="bg-chathams" style="padding: 20px">
                                    <h5 style="color: white">Resolution No. {{$resolution->number}}</h5>
                                </div>
                                <p class="desc" style="margin-top: 10px;">
                                    {!! Str::words($resolution->title, 30,'...')  !!}
                                </p>
                                <a href="/public/showResolution/{{$resolution->id}}"><i
                                            class="fa fa-arrow-circle-o-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-6 col-xs-12">
            <section class="what-we-do bg-starship-gradient">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="text-center">
                            LEGISLATIONS BEING MONITORED
                        </h2>
                    </div>
                </div>
            </section>
            <br>
            <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                <h2>Ordinances Being Monitored</h2>
                <div class="heading-border-light"></div>
            </div>

            <div class="owl-carousel owl-theme">
                @foreach($monitoringOrd as $ordinance)
                    <div class="item">
                        <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                            <div class="desc-comp-offer-cont" style="text-align: center">
                                <div class="bg-starship" style="padding: 20px">
                                    <h5 style="color: white">Ordinance No. {{$ordinance->number}}</h5>
                                </div>
                                <p class="desc" style="margin-top: 10px;">
                                    {!! Str::words($ordinance->title, 30,'...')  !!}
                                </p>
                                <a href="/public/showOrdinance/{{$ordinance->id}}"><i
                                            class="fa fa-arrow-circle-o-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- start reso --}}
            <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                <h2>Resolutions Currently Being Monitored</h2>
                <div class="heading-border-light"></div>
                {{--<button class="btn btn-general btn-green" role="button">See More</button>--}}
            </div>

            <div class="owl-carousel owl-theme">
                @foreach($monitoringRes as $resolution)
                    <div class="item">
                        <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                            <div class="desc-comp-offer-cont" style="text-align: center">
                                <div class="bg-starship" style="padding: 20px">
                                    <h5 style="color: white">Resolution No. {{$resolution->number}}</h5>
                                </div>

                                <p class="desc" style="margin-top: 10px;">
                                    {!! Str::words($resolution->title, 30,'...')  !!}
                                </p>

                                <a href="/public/showResolution/{{$resolution->id}}"><i
                                            class="fa fa-arrow-circle-o-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- end reso --}}
        </div>
    </div>
</div>
    </section>



    {{-- END NEW LAYOUT--}}
    <!--====================================================
                         HOME
======================================================-->
    {{--<section id="home">--}}
    {{--<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">--}}
            {{--<!-- Carousel items -->--}}
            {{--<div class="carousel-inner">--}}
                {{--<div class="carousel-item active slides">--}}
                    {{--<div class="overlay"></div>--}}
                    {{--<div class="slide-1"></div>--}}
                    {{--<div id="hero" class="hero">--}}
                        {{--<hgroup class="wow fadeInUp">--}}
                            {{--<h1>Let's Work together!</h1>--}}
                            {{--<h1>We need your <span>--}}
                                    {{--<a href="" class="typewrite" data-period="2000"--}}
                                       {{--data-type='[ " Participation", " Opinion"]'>--}}
                        {{--<span class="wrap"></span></a></span></h1>--}}
                        {{--</hgroup>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    <!--====================================================
                   SERVICE-HOME
======================================================-->
    {{--<section id="service-h">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}

                {{--<div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">--}}
                    {{--<div class="service-h-desc">--}}
                        {{--<h3>Monitoring and Evaluation</h3>--}}
                        {{--<div class="heading-border-light"></div>--}}
                        {{--<p style="text-align: justify">--}}
                            {{--The Sanggunian is pursuing its monitoring of the implementation or enforcement of ordinances--}}
                            {{--and resolutions enacted by the body. This is being conducted because the legislative body is--}}
                            {{--not only tasked to enact new legislations, but it also has a duty to ensure that existing--}}
                            {{--legislations are implemented and administered efficiently, effectively, and in a manner--}}
                            {{--consistent with its legislative intent.--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    {{--<section class="what-we-do bg-gradiant">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}



    <!--====================================================
                    ABOUT MAIN CONTENT
    ======================================================-->
    {{--<section id="about" class="about">--}}
        {{--<div class="container">--}}
            {{--<div class="row title-bar">--}}
                {{--<div class="col-md-12" style="border: dashed #37c8d6">--}}
                    {{--<h1 class="wow fadeInUp">Hello there!</h1>--}}
                    {{--<div class="heading-border"></div>--}}
                    {{--<p class="wow fadeInUp" data-wow-delay="0.4s">--}}
                        {{--The Sangguniang Panlungsod ng Baguio is conducting a legislative monitoring and evaluation of--}}
                        {{--the following ordinances and resolutions. In this regard, may we solicit your comments and--}}
                        {{--suggestions or recommendations in relation to the following legislations.--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    {{-- carousel for the legislation --}}
    <!--====================================================
                           NEWS
    ======================================================-->
    {{--<section id="comp-offer1" style="margin: 0 50px 20px">--}}
        {{--<div id="hello" class="container-fluid">--}}

            {{--<div class="row">--}}
                {{--<div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">--}}
                    {{--<h2>Ordinances Currently Being Monitored</h2>--}}
                    {{--<div class="heading-border-light"></div>--}}
                    {{--<button class="btn btn-general btn-green" role="button">See More</button>--}}
                {{--</div>--}}

                {{--<div class="owl-carousel owl-theme">--}}

                    {{--@foreach($monitoringOrd as $ordinance)--}}
                        {{--<div class="item">--}}
                            {{--<div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">--}}
                                {{--<div class="desc-comp-offer-cont" style="text-align: center">--}}
                                    {{--<div class="thumbnail-blogs">--}}
                                    {{--<div class="caption">--}}
                                    {{--<i class="fa fa-chain"></i>--}}
                                    {{--</div>--}}
                                    {{--<img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">--}}
                                    {{--</div>--}}
                                    {{--<div class="bg-starship" style="padding: 20px">--}}
                                        {{--<h5 style="color: white">Ordinance No. {{$ordinance->number}}</h5>--}}
                                    {{--</div>--}}
                                    {{--<p class="desc" style="margin-top: 10px;">--}}
                                        {{--{!! Str::words($ordinance->title, 30,'...')  !!}--}}
                                    {{--</p>--}}
                                    {{--<a href="/public/showOrdinance/{{$ordinance->id}}"><i--}}
                                                {{--class="fa fa-arrow-circle-o-right"></i> Read More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<hr/>--}}

            {{--<div class="row">--}}
                {{--<div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">--}}
                    {{--<h2>Resolutions Currently Being Monitored</h2>--}}
                    {{--<div class="heading-border-light"></div>--}}
                    {{--<button class="btn btn-general btn-green" role="button">See More</button>--}}
                {{--</div>--}}

                {{--<div class="owl-carousel owl-theme">--}}
                    {{--@foreach($monitoringRes as $resolution)--}}
                        {{--<div class="item">--}}
                            {{--<div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">--}}
                                {{--<div class="desc-comp-offer-cont" style="text-align: center">--}}
                                    {{--<div class="thumbnail-blogs">--}}
                                    {{--<div class="caption">--}}
                                    {{--<i class="fa fa-chain"></i>--}}
                                    {{--</div>--}}
                                    {{--<img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">--}}
                                    {{--</div>--}}
                                    {{--<div class="bg-starship" style="padding: 20px">--}}
                                        {{--<h5 style="color: white">Resolution No. {{$resolution->number}}</h5>--}}
                                    {{--</div>--}}
                                    {{--<h3>{{ str_limit($resolution->title, $limit = 120, $end = '...') }}</h3>--}}
                                    {{--<p class="desc" style="margin-top: 10px;">--}}
                                        {{--                                        {{ str_limit($resolution->title, $limit = 120, $end = '...') }}--}}
                                        {{--{!! Str::words($resolution->title, 30,'...')  !!}--}}
                                    {{--</p>--}}
                                    {{--<a href="/public/showResolution/{{$resolution->id}}"><i--}}
                                                {{--class="fa fa-arrow-circle-o-right"></i> Read More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    <!--====================================================
                         WHAT WE DO
    ======================================================-->

    {{--HORIZONTAL BAR--}}
    {{--<section class="what-we-do bg-gradiant">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    {{-- carousel for the legislation --}}
    <!--====================================================
                           NEWS
    ======================================================-->
    {{--<section id="comp-offer">--}}
        {{--<div id="hello" class="container-fluid">--}}

            {{--<div class="row">--}}
                {{--<div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">--}}
                    {{--<h2>Latest ordinances</h2>--}}
                    {{--<div class="heading-border-light"></div>--}}
                    {{--<button class="btn btn-general btn-green" role="button">See More</button>--}}
                {{--</div>--}}
                {{--<div class="owl-carousel owl-theme col-9">--}}
                    {{--@foreach($ordinances as $ordinance)--}}
                        {{--<div class="item">--}}
                            {{--<div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">--}}
                                {{--<div class="desc-comp-offer-cont" style="text-align: center">--}}
                                    {{--<div class="thumbnail-blogs">--}}
                                    {{--<div class="caption">--}}
                                    {{--<i class="fa fa-chain"></i>--}}
                                    {{--</div>--}}
                                    {{--<img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">--}}
                                    {{--</div>--}}
                                    {{--<div class="bg-chathams" style="padding: 20px">--}}
                                        {{--<h5 style="color: white">Ordinance No. {{$ordinance->number}}</h5>--}}
                                    {{--</div>--}}
                                    {{--<p class="desc" style="margin-top: 10px;">--}}
                                        {{--{!! Str::words($ordinance->title, 30,'...')  !!}--}}
                                    {{--</p>--}}
                                    {{--<a href="/public/showOrdinance/{{$ordinance->id}}"><i--}}
                                                {{--class="fa fa-arrow-circle-o-right"></i> Read More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<br/>--}}

            {{--<div class="row">--}}
                {{--<div class="col-md-3 col-sm-6  desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">--}}
                    {{--<h2>Latest Resolutions</h2>--}}
                    {{--<div class="heading-border-light"></div>--}}
                    {{--<button class="btn btn-general btn-green" role="button">See More</button>--}}
                {{--</div>--}}
                {{--<div class="owl-carousel owl-theme col-9">--}}
                    {{--@foreach($resolutions as $resolution)--}}
                        {{--<div class="item">--}}
                            {{--<div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">--}}
                                {{--<div class="desc-comp-offer-cont" style="text-align: center">--}}
                                    {{--<div class="thumbnail-blogs">--}}
                                    {{--<div class="caption">--}}
                                    {{--<i class="fa fa-chain"></i>--}}
                                    {{--</div>--}}
                                    {{--<img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">--}}
                                    {{--</div>--}}
                                    {{--<div class="bg-chathams" style="padding: 20px">--}}
                                        {{--<h5 style="color: white">Resolution No. {{$resolution->number}}</h5>--}}
                                    {{--</div>--}}
                                    {{--<h3>{{ str_limit($resolution->title, $limit = 120, $end = '...') }}</h3>--}}
                                    {{--<p class="desc" style="margin-top: 10px;">--}}
                                        {{--                                        {{ str_limit($resolution->title, $limit = 120, $end = '...') }}--}}
                                        {{--{!! Str::words($resolution->title, 30,'...')  !!}--}}
                                    {{--</p>--}}
                                    {{--<a href="/public/showResolution/{{$resolution->id}}"><i--}}
                                                {{--class="fa fa-arrow-circle-o-right"></i> Read More</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}


            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection

@section('scripts')
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            rtl: true,
            margin: 10,
            nav: true,
            dots: false,
            startPosition: 11,
            animateOut: true
        });
    </script>
    {{-- removed time out of hero box --}}
    <script>
        //        function closeit() {
        //            document.getElementById('hero').setAttribute("style", "display:none");
        //        }
        //        setTimeout(closeit, 9000);
    </script>
    <script>
        document.getElementById('nav-home-tab').onclick = function () {
            document.getElementById('hi').setAttribute("style", "display:none");
        };
        document.getElementById('nav-profile-tab').onclick = function () {
            document.getElementById('hi').setAttribute("style", "display:block");
        };
    </script>
@endsection