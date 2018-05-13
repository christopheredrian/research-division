@extends('layouts.pub2')
@section('content')
    <!--====================================================
                          BUSINESS-GROWTH-P1
    ======================================================-->
    <section id="business-growth-p1" class="business-growth-p1 bg-white">
        <div class="container">
            <div class="row title-bar">
                <div class="col-md-12">
                    {{--<h1 class="wow fadeInUp">Ordinances</h1>--}}
                    {{--<div class="heading-border"></div>--}}
                    {{--<p class="wow fadeInUp" data-wow-delay="0.4s">An ordinance is a local law that prescribes rules of--}}
                        {{--conduct of a general, permanent character. It continues to be in force until repealed or--}}
                        {{--superseded by a subsequent enactment of the local legislative body.</p>--}}
                    <div id="ordinance">
                        <div class="container">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection