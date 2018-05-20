@extends('layouts.pub2')
@section('styles')
    <link rel="stylesheet" href="/pub2/css/about.css">
@endsection
@section('content')
    <!--====================================================
                       HOME-P
======================================================-->
    <div id="home-p" class="home-p pages-head4 text-center">
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
                                   role="tab" aria-controls="nav-home" aria-expanded="true">SP Baguio</a>
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
                                                        <h3>Sangguniang Panlungsod ng Baguio</h3>
                                                        <div class="heading-border-light"></div>
                                                        <p style="text-align: justify">
                                                            The Sangguniang Panlungsod, as the legislative body of the
                                                            city, shall enact ordinances, approve resolutions and
                                                            appropriate funds for the general welfare of the city and
                                                            inhabitants pursuant to Section 16 of Republic Act No. 7160
                                                            or the Local Government Code of 1991 and in the proper
                                                            exercise of the corporate powers of the city as provided for
                                                            under Section 22 of the said Code. The Local Legislators are
                                                            expected to perform other roles as contained in the Local
                                                            Legislators' Tool Kit and their Internal Rules and
                                                            Procedure.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="story-himg">
                                                        <img src="/pub2/img/img/burnham-park.jpg"
                                                             class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
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
                                                        <img src="/pub2/img/img/lake.jpg" class="img-fluid wow fadeInUp"
                                                             data-wow-delay="0.1s"
                                                             alt="...">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="about-p2-cont cl-white wow fadeInUp"
                                                         data-wow-delay="0.3s">
                                                        <h5>Mission</h5>
                                                        <p class="cl-white" style="text-align: justify">To enact oridnances, approve resolutions,
                                                            and appropriate funds for the general welfare of the
                                                            city and its inhabitants.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="about-p2-cont cl-white wow fadeInUp"
                                                         data-wow-delay="0.5s">
                                                        <h5>Vision</h5>
                                                        <p class="cl-white" style="text-align: justify">We envision quality legislation reflective
                                                            of the aspirations of the people for a better
                                                            quality of life in a clean and green environment.</p>
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
                                                        <h3>Research Division of the Sangguniang Panlungsod</h3>
                                                        <div class="heading-border-light"></div>
                                                        <p style="text-align: justify">
                                                            The Research Division is under the Sangguniang Panlungsod
                                                            and have the following functions:
                                                        <ol>
                                                            <li>
                                                                Attends meetings, public hearings, and any other kind of
                                                                meeting of the Sanggunian to assist in research work and
                                                                gathers information for the Sanggunian.
                                                            </li>
                                                            <li>
                                                                Performs research work referred to by the Sanggunian,
                                                                various offices/agencies, and the general public on
                                                                approved ordinances and resolutions and other related
                                                                documents.
                                                            </li>
                                                            <li>
                                                                Keeps and maintains original copies of of the City of
                                                                Baguio's approved ordinances and resolutions and other
                                                                related documents.
                                                            </li>
                                                            <li>
                                                                Encodes and maintains records in the SP-LMS database
                                                                including indices of approved ordinances and
                                                                resolutions;
                                                            </li>
                                                            <li>
                                                                Sends out copies of ordinances and resolutions to
                                                                concerned persons/offices for
                                                                information/implementation.
                                                            </li>
                                                            <li>
                                                                Sends out publication for approved ordinances.
                                                            </li>
                                                            <li>
                                                                Coordinates with other agencies/department in gathering
                                                                data.
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="story-himg">
                                                        <img src="/pub2/img/img/burnham.jpg"
                                                             class="img-fluid wow fadeInUp" data-wow-delay="0.1s"
                                                             alt="">
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
