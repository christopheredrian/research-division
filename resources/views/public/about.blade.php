@extends('layouts.pub2')
@section('styles')
    <link rel="stylesheet" href="/pub2/css/about.css">
@endsection
@section('content')
    <!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" class="home-p pages-head1 text-center">
        <div class="container">
            <h1 class="wow fadeInUp" data-wow-delay="0.1s">ABOUT US</h1>
            <p></p>
        </div>
        <!--/end container-->
    </div>

    <!--====================================================
                   SERVICE-HOME
======================================================-->
    <section id="about-p1">
        <div class="container-fluid">
            <div class="">
                <div class="wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-h-desc">

                        <div class="service-h-tab">
                            <nav class="nav nav-tabs" id="myTab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-expanded="true">Baguio City</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                   role="tab" aria-controls="nav-profile">Research Division</a>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">

                                    <!--====================================================
                                                            ABOUT-P1
                                    ======================================================-->
                                    <section id="story" class="about-p1">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="story-desc">
                                                        <h3>Baguio City</h3>
                                                        <div class="heading-border-light"></div>
                                                        <p>The name Baguio conjures, for both the international and domestic traveler, a highland
                                                            retreat in
                                                            the Grand Cordillera in Northern Luzon,
                                                            with pine trees, crisp cold breezes and low verdant knolls and hillocks.
                                                            Through the numerous decades Baguio has morphed from what was once a grassy marshland into
                                                            one
                                                            of the cleanest and greenest,
                                                            most highly urbanized cities in the country. It has made its mark as a premiere tourist
                                                            destination in the Northern part of the Philippines with its cool climate,
                                                            foggy hills, panoramic views and lovely flowers. </p>
                                                        <p> Being the ideal convergence zone of neighboring
                                                            highland places,
                                                            Baguio is the melting pot of different peoples and cultures and has boosted its ability to
                                                            provide a center for education for its neighbors.
                                                            Its rich culture and countless resources have lured numerous investments and business
                                                            opportunities to the city.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="story-himg">
                                                        <img src="/pub2/img/img/burnham.jpg" class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
                                                             alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="story-desc">
                                                        <h3>History</h3>
                                                        <div class="heading-border-light"></div>
                                                        <p>The name Baguio conjures, for both the international and domestic traveler, a highland
                                                            retreat in
                                                            the Grand Cordillera in Northern Luzon,
                                                            with pine trees, crisp cold breezes and low verdant knolls and hillocks.
                                                            Through the numerous decades Baguio has morphed from what was once a grassy marshland into
                                                            one
                                                            of the cleanest and greenest,
                                                            most highly urbanized cities in the country. It has made its mark as a premiere tourist
                                                            destination in the Northern part of the Philippines with its cool climate,
                                                            foggy hills, panoramic views and lovely flowers. </p>
                                                        <p> Being the ideal convergence zone of neighboring
                                                            highland places,
                                                            Baguio is the melting pot of different peoples and cultures and has boosted its ability to
                                                            provide a center for education for its neighbors.
                                                            Its rich culture and countless resources have lured numerous investments and business
                                                            opportunities to the city.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!--====================================================
                                                           ABOUT-P2
                                    ======================================================-->
                                    <section class="about-p2 bg-gradiant">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="about-p2-cont cl-white">
                                                        <img src="/pub2/img/img/lake.jpg" class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
                                                             alt="...">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="about-p2-cont cl-white wow fadeInUp" data-wow-delay="0.3s">
                                                        <h5>Mission</h5>
                                                        <p class="cl-white">We shall create a sustainable and enabling environment that will promote
                                                            economic stability and
                                                            ensure the general well being of our citizenry</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="about-p2-cont cl-white wow fadeInUp" data-wow-delay="0.5s">
                                                        <h5>Vision</h5>
                                                        <p class="cl-white">Baguio is home of diverse and dynamic cultures, center for education, trade
                                                            and tourism in
                                                            harmony with nature managed by God-fearing steadfast leaders in partnership with responsible
                                                            and
                                                            peace-loving citizenry.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">

                                    <!--====================================================
                                                            ABOUT-P1
                                    ======================================================-->
                                    <section id="story" class="about-p1">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="story-desc">
                                                        <h3>The Research Division ng Sangguniang Panlungsod</h3>
                                                        <div class="heading-border-light"></div>
                                                        <p>Attends meetings, public hearings, and any other kind of meeting of the
                                                            Sanggunian to help and do research work and gather information
                                                            for the Sanggunian. Research work are on approved ordinances and
                                                            resolutions. We also maintain original copies of ordinances, resolutions and
                                                            other related documents. Sends out copies of ordinances and resolutions to
                                                            concerned offices/persons for implementaion or information,
                                                            We also send out publications of approved ordinances and resolutions. We
                                                            also coordinate with other agencies for information collection.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="story-himg">
                                                        <img src="/pub2/img/img/burnham.jpg" class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
                                                             alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!--====================================================
                                                           ABOUT-P2
                                    ======================================================-->
                                    <section class="about-p2 bg-gradiant">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="about-p2-cont cl-white">
                                                        <img src="/pub2/img/img/lake.jpg" class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
                                                             alt="...">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="about-p2-cont cl-white wow fadeInUp" data-wow-delay="0.3s">
                                                        <h5>Mission</h5>
                                                        <p class="cl-white">To enact oridnances, approve resolutions, and appropriate funds for the general welfare of the
                                                            city and its inhabitants.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="about-p2-cont cl-white wow fadeInUp" data-wow-delay="0.5s">
                                                        <h5>Vision</h5>
                                                        <p class="cl-white">We envision quality legislation reflective of the aspirations of the people for a better
                                                            quality of life in a clean and green environment.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
