@extends('layouts.public')
@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lobster');
        h2 {
            font-family: "Lobster";
        }
        .banner {
            height: 50vh;
            width: 100%;
            background-image: url('./images/about/burnham.JPG');
            background-size: 100% 100%;
        }

        .pill {
            height: 0px;
            border-radius: 2px;
            color: teal;
            border: 2px solid currentColor;
            width: 80%;
        }
    </style>
    @endsection
@section('content')
    <div class="container">
        <div class="banner"></div>
        <br>
        <div class="row">
            <div class="col-lg-5">
                <img src="./images/about/lake.JPG">
            </div>
            <div class="content col-lg-7">
                <h2> Baguio City</h2>
                <article>
                    <p>The name Baguio conjures, for both the international and domestic traveler, a highland retreat in the Grand Cordillera in Northern Luzon,
                        with pine trees, crisp cold breezes and low verdant knolls and hillocks.
                        Through the numerous decades Baguio has morphed from what was once a grassy marshland into one of the cleanest and greenest,
                        most highly urbanized cities in the country. It has made its mark as a premiere tourist destination in the Northern part of the Philippines with its cool climate,
                        foggy hills, panoramic views and lovely flowers. Being the ideal convergence zone of neighboring highland places,
                        Baguio is the melting pot of different peoples and cultures and has boosted its ability to provide a center for education for its neighbors.
                        Its rich culture and countless resources have lured numerous investments and business opportunities to the city.
                    </p>
                    <h2>Mission</h2>
                    <p>
                        We shall create a sustainable and enabling environment that will promote economic stability and ensure the general well being of our citizenry.
                    </p>
                    <h2>Vision</h2>
                    <p>
                        Baguio is home of diverse and dynamic cultures, center for education, trade and tourism in harmony with nature managed by God-fearing steadfast leaders in partnership with responsible and peace-loving citizenry.
                    </p>
                </article>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section>
                    <h2>History</h2>
                    <article>
                        <p>
                        The arrival of the Americans in the early 1900s spurred development in the City.
                        The American Governor Luke E. Wright commissioned Architect Daniel H. Burnham, a prominent Urban Planner to develop a plan for a health resort where the American soldiers and civilian employees could find respite from the sweltering lowland heat.
                        This plan, better known as the Burnham Plan greatly altered the original mountain settlement and provided the first physical framework plan for the City.
                        It paved the way for rapid physical development, the undertones of which are still visible up this date.
                        The physical framework as embodied in the Burnham Plan integrates a road and park system into one. '
                        It envisioned evolving in a compact garden city for 25,000 to 30,000 people.
                        Supporting this development plan was the enactment of a charter approved on September 1, 1909 that provided administrative as well as managerial autonomy for the city.
                        Soon after the city’s charter was enacted, scenic Kennon Road was opened to vehicular traffic. This triggered the mining boom in surrounding areas in the early to mid 1930’s.
                        Baguio City was the service and operations center for the mining industry, and hence a direct beneficiary of the economic growth.
                        The events of the Second World War stalled all development, leaving the city in total devastation. Fast placed development however ensued following the war years.
                        Such development trends transformed the city into what it is today, a premier urban center north of Manila, performing a municipality of roles, as an educational, trade, tourism and administrative center.
                        </p>
                    </article>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <section>
                    <h2>Climate</h2>
                    <article>
                        <p>Baguio is 8 degrees cooler on the average than any place in lowlands. When Manila sweats at 35 degrees centigrade or above, Baguio seldom exceeds 26 degrees centigrade at its warmest.
                            Baguio is very wet during the Philippine rainy season, which is from June to October.
                            It gets the biggest amount of rainfall in the country, twice the volume of rainfall in the country as compared to Manila. However from November to May, Baguio becomes a tropical paradise, a refreshing break from the hot and humid Philippine climate.
                            Christmas season is when Baguio glows with the nippy winter air. In the summer month of March, April, May, Baguio lives up to its title as the “”Summer Capital of the Philippines when thousands of visitors from the lowlands and Manila take their annual exodus to the city to cool off.
                            Casual clothing is recommended worn with jackets or sweaters in the late afternoons or evenings.</p>
                    </article>
                </section></div>
            <div class="col-lg-6">
                <section>
                    <h2>Geography</h2>
                    <article>
                        <p>Baguio City is approximately 250 kilometers north of Manila, situated in the Province of Benguet.
                            The area of the city is 49 square kilometers enclosed in the perimeter of 30 kilometers.
                            The developed portion of the city corresponds to the plateau that rises to an elevation of 1,400 meters. Most of it lies in the northern half of the city.
                            The City is landlocked within the province of Benguet, thus bounding it on all sides by its different municipalities; on the North by the capital town of La Trinidad, on the East by Itogon and to the South and West by Tuba.
                            With City Hall as reference point, it extends 8.2 kilometers from East to West and 7.2 kilometers from North to South.
                            It has a perimeter of 30.98 kilometers. The City has twenty administrative districts among which its barangays are divided.</p>
                    </article>
                </section>
            </div>
        </div>

        <hr class="pill">

        <div class="row">
            <div class="col-lg-6">
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
                </section>
            </div>
            <div class="col-lg-5">
                <h2> Mission</h2>
                <section>
                <article>
                    "To enact oridnances, approve resolutions, and appropriate funds for the general welfare of the city and its inhabitants."
                </article>
                <h2 > Vision</h2>
                <article>
                    "We envision quality legislation reflective of the aspirations of the people for a better quality of life in a clean and green environment."
                </article>
                </section>
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
