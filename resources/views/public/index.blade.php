@extends('layouts.pub2')
@section('content')

    <!--====================================================
                         HOME
======================================================-->
    <section id="home">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="carousel-item active slides">
                    <div class="overlay"></div>
                    <div class="slide-1"></div>
                    <div class="hero ">
                        <hgroup class="wow fadeInUp">
                            <h1>Let's Work together!</h1>
                            <h1>We need your <span><a href="" class="typewrite" data-period="2000"
                                                      data-type='[ " Participation", " Opinion"]'>
                        <span class="wrap"></span></a></span></h1>
                            <h3>To enhance and improve local legislations</h3>
                        </hgroup>
                        {{--<button class="btn btn-general btn-green wow fadeInUp" role="button">Contact Now</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====================================================
                            ABOUT
    ======================================================-->
    <section id="about" class="about">
        <div class="container">
            <div class="row title-bar">
                <div class="col-md-12">
                    <h1 class="wow fadeInUp">We committed to helping</h1>
                    <div class="heading-border"></div>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">
                        *Caption*
                    </p>

                    <div class="service-h-tab">
                        <nav class="nav nav-tabs" id="myTab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                               role="tab" aria-controls="nav-home" aria-expanded="true">Ordinance</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                               role="tab" aria-controls="nav-profile">Resolutions</a>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">

                                <!--====================================================
                                    OFFER
                                ======================================================-->
                                <br/>
                                <div class="container-fluid ">
                                    <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.1s">
                                        <h2>Ordinances Currently Being Monitored</h2>
                                        <div class="heading-border-light"></div>
                                    </div>
                                    <div class="row">
                                        @foreach($monitoringOrd as $ordinance)
                                            <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp"
                                                 data-wow-delay="0.8s">
                                                <div class="desc-comp-offer-cont" style="text-align: center">
                                                    <div class="thumbnail-blogs">
                                                        <div class="caption">
                                                            <i class="fa fa-chain"></i>
                                                        </div>
                                                        <img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">
                                                    </div>
                                                    <h3>{{ str_limit($ordinance->title, $limit = 200, $end = '...') }}</h3>
                                                    {{--<p class="desc">--}}
                                                    {{----}}
                                                    {{--</p>--}}
                                                    <a href="/public/showOrdinance/{{$ordinance->id}}">
                                                        <i class="fa fa-arrow-circle-o-right"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">

                                <!--====================================================
                                    OFFER
                                ======================================================-->
                                <br/>
                                <div class="container-fluid">
                                    <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.1s">
                                        <h2>Resolutions Currently Being Monitored</h2>
                                        <div class="heading-border-light"></div>
                                    </div>
                                    <div class="row">
                                        @foreach($monitoringRes as $resolution)
                                            <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp"
                                                 data-wow-delay="0.8s">
                                                <div class="desc-comp-offer-cont" style="text-align: center">
                                                    <div class="thumbnail-blogs">
                                                        <div class="caption">
                                                            <i class="fa fa-chain"></i>
                                                        </div>
                                                        <img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">
                                                    </div>
                                                    <h3>{{ str_limit($resolution->title, $limit = 200, $end = '...') }}</h3>
                                                    {{--<p class="desc">--}}
                                                    {{----}}
                                                    {{--</p>--}}
                                                    <a href="/public/showResolution/{{$resolution->id}}">
                                                        <i class="fa fa-arrow-circle-o-right"></i> Read More
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>



    <!--====================================================
                         WHAT WE DO
    ======================================================-->
    <section class="what-we-do bg-gradiant">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <h3>What we Do</h3>
                    <div class="heading-border-light"></div>
                    <p class="desc">We partner with clients to put recommendations into practice. </p>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4  col-sm-6">
                            <div class="what-we-desc">
                                <i class="fa fa-briefcase"></i>
                                <h6>Workspace</h6>
                                <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-6">
                            <div class="what-we-desc">
                                <i class="fa fa-shopping-bag"></i>
                                <h6>Storefront</h6>
                                <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-6">
                            <div class="what-we-desc">
                                <i class="fa fa-building-o"></i>
                                <h6>Apartments</h6>
                                <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-6">
                            <div class="what-we-desc">
                                <i class="fa fa-bed"></i>
                                <h6>Hotels</h6>
                                <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-6">
                            <div class="what-we-desc">
                                <i class="fa fa-hourglass-2"></i>
                                <h6>Concept</h6>
                                <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-6">
                            <div class="what-we-desc">
                                <i class="fa fa-cutlery"></i>
                                <h6>Restaurant</h6>
                                <p class="desc">Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--====================================================
                           NEWS
    ======================================================-->
    <section id="comp-offer">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-3 col-sm-6 desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                    <h2>Latest ordinances</h2>
                    <div class="heading-border-light"></div>
                    {{--<button class="btn btn-general btn-green" role="button">See More</button>--}}
                </div>

                <div class="owl-carousel owl-theme col-9">

                    @foreach($ordinances as $ordinance)

                        <div class="item">

                            <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                                <div class="desc-comp-offer-cont" style="text-align: center">
                                    <div class="thumbnail-blogs">
                                        <div class="caption">
                                            <i class="fa fa-chain"></i>
                                        </div>
                                        <img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">
                                    </div>
                                    <h3>{{ str_limit($ordinance->title, $limit = 120, $end = '...') }}</h3>
                                    <a href="/public/showOrdinance/{{$ordinance->id}}"><i
                                                class="fa fa-arrow-circle-o-right"></i> Read More</a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <br/>

            <div class="row">

                <div class="owl-carousel owl-theme col-9">

                    @foreach($resolutions as $resolution)

                        <div class="item">

                            <div class="desc-comp-offer wow fadeInUp" data-wow-delay="0.4s">
                                <div class="desc-comp-offer-cont" style="text-align: center">
                                    <div class="thumbnail-blogs">
                                        <div class="caption">
                                            <i class="fa fa-chain"></i>
                                        </div>
                                        <img src="/pub2/img/img/res.jpg" class="img-fluid" alt="...">
                                    </div>
                                    <h3>{{ str_limit($resolution->title, $limit = 120, $end = '...') }}</h3>
                                    <a href="/public/showResolution/{{$resolution->id}}"><i
                                                class="fa fa-arrow-circle-o-right"></i> Read More</a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <div class="col-md-3 col-sm-6  desc-comp-offer wow fadeInUp" data-wow-delay="0.2s">
                    <h2>Latest Resolutions</h2>
                    <div class="heading-border-light"></div>
                    {{--<button class="btn btn-general btn-green" role="button">See More</button>--}}
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            rtl:true,
            margin:10,
            nav:true
        });
    </script>
@endsection