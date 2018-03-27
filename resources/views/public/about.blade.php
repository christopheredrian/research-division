@extends('layouts.public')
@section('styles')
    <style>
        .banner {
            height: 50vh;
            width: 100%;
            background-image: url('/images/burnham.jpg');
            background-size: 100% 100%;
        }
    </style>
    @endsection
@section('content')
    <div class="container">
        <div class="banner"></div>
        <br>
        <div class="row">
            <div class="content col-lg-5">
                <h2> Baguio City</h2>
                <article>
                    <p>Baguio City is Located in th Northen Luzon. Dubbed as the Summer Capital of the Philippines, having earned this name
                        because of it's cool climate since that Baguio is located 5,000 feet above sea level. Baguio has since been
                        independent of Benguet after it's conversion to a chartered city.Baguio City consists of 129 barangays.</p>

                    <p>

                    </p>
                </article>
            </div>
            <div class="col-lg-7">
                <img src="/images/lake.jpg">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <section>
                    <h2> The Research Division ng Sangguniang Panlungsod</h2>
                    <article>
                        Attends meetings, public hearings, and any other kind of meeting of the
                        Sanggunian to help and do research work and gather information
                        for the Sanggunian. Research work are on approved ordinances and
                        resolutions. We also maintain original copies of ordinances, resolutions and
                        other related documents. Sends out copies of ordinances and resolutions to
                        concerned offices/persons for implementaion or information,
                        We also send out publications of approved ordinances and resolutions. We
                        also coordinate with other agencies for information collection.
                    </article>
                    <h3> Mission</h3>
                    <article>
                        "To enact oridnances, approve resolutions, and appropriate funds for the general welfare of the city and its inhabitants."
                    </article>
                    <h3> Vision</h3>
                    <article>
                        "We envision quality legislation reflective of the aspirations of the people for a better quality of life in a clean and green environment."
                    </article>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
            </div>
        </div>
    </div>


    {{--<div class="view">--}}
        {{--<div class="">--}}
            {{--<div id="ordinance">--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">--}}
                            {{--<div class="ordinance-heading">--}}
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
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!--about wrapper right-->--}}
                        {{--<div class="col-xs-12 col-md-7">--}}
                            {{--<div class="ordinance-right">--}}
                                {{--<div class="ordinance-right-heading">--}}
                                    {{--<h1>About Us</h1>--}}
                                {{--</div>--}}
                                {{--<div class="ordinance-right-wrapper">--}}
                                    {{--<article>--}}
                                        {{--<p>--}}
                                            {{--The Research Division<br>--}}
                                            {{--Attends meetings, public hearings, and any other kind of meeting of the--}}
                                            {{--Sanggunian to help and do research work and gather information--}}
                                            {{--for the Sanggunian. Research work are on approved ordinances and--}}
                                            {{--resolutions. We also maintain original copies of ordinances, resolutions and--}}
                                            {{--other related documents. Sends out copies of ordinances and resolutions to--}}
                                            {{--concerned offices/persons for implementaion or information,--}}
                                            {{--We also send out publications of approved ordinances and resolutions. We--}}
                                            {{--also coordinate with other agencies for information collection.--}}
                                        {{--</p>--}}
                                        {{--<p>Telephone number: (074) 446-3366</p>--}}
                                    {{--</article>--}}

                                    {{--<h3><b> Mission </b></h3>--}}
                                    {{--<p>--}}
                                        {{--"To enact oridnances, approve resolutions, and appropriate funds for the general welfare of the city and its inhabitants."--}}
                                    {{--</p>--}}
                                    {{--<h3><b> Vision </b></h3>--}}
                                    {{--<p>--}}
                                        {{--"We envision quality legislation reflective of the aspirations of the people for a better quality of life in a clean and green environment."--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                                {{--<br/>--}}

                                {{--<div class="ordinance-right-wrapper"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
