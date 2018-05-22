@extends('layouts.pub2')
@section('styles')
    <style type="text/css">
        body {
            overflow-x: hidden;
        }
    </style>
@endsection
@section('content')
    <!--====================================================
                       HOME-P
    ======================================================-->
    <div id="home-p" class="home-p pages-head2 text-center">
        <div class="container" style="max-height: 30px">
            <h4 class="" style="color: #fff0ff" data-wow-delay="0.1s">Ordinances</h4>
            <p class="wow fadeInUp" data-wow-delay="0.4s" style="font-size: 15px">
                An ordinance is a local law that prescribes rules of
                conduct of a general, permanent character. It continues to be in force until repealed or
                superseded by a subsequent enactment of the local legislative body.</p>
            </p>
        </div><!--/end container-->
    </div>

    <!--====================================================
                          BUSINESS-GROWTH-P1
    ======================================================-->
    <section id="business-growth-p1" class="business-growth-p1 bg-white">
        <div class="container">
            <div class="row title-bar" style="padding-bottom: 0; padding-top: 10px;">
                {{--<div class="col-md-12">--}}
                    {{--<h2 class="wow fadeInUp text-center">Ordinances</h2>--}}
                    {{--<div class="heading-border"></div>--}}
                    {{--<p class="wow fadeInUp" data-wow-delay="0.4s">An ordinance is a local law that prescribes rules of--}}
                        {{--conduct of a general, permanent character. It continues to be in force until repealed or--}}
                        {{--superseded by a subsequent enactment of the local legislative body.</p>--}}
                {{--</div>--}}
            </div>
            <br>
            <div class="row" style="padding-top: 0">
                <div class="ordinance-right">
                    <div class="col-md-12">
                        @if($ordinances->first() === null)
                            <div class="row text-center">
                                <h1>No results found.</h1>
                            </div>
                            <br>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-gray">
                                <tr>
                                    <th>
                                        <a href="
                                                    @if(request()->colName === 'number' and request()->order === 'desc')
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'number';
                                            $currentUrlQueries['order'] = 'asc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp

                                        @else
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'number';
                                            $currentUrlQueries['order'] = 'desc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp
                                        @endif">
                                            Ordinance Number
                                        </a>
                                    </th>
                                    <th>
                                        <a href="
                                                    @if(request()->colName === 'series' and request()->order === 'desc')
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'series';
                                            $currentUrlQueries['order'] = 'asc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp
                                        @else
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'series';
                                            $currentUrlQueries['order'] = 'desc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp
                                        @endif">
                                            Series
                                        </a>
                                    </th>
                                    <th>
                                        <a href="
                                                    @if(request()->colName === 'title' and request()->order === 'desc')
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'title';
                                            $currentUrlQueries['order'] = 'asc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp
                                        @else
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'title';
                                            $currentUrlQueries['order'] = 'desc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp
                                        @endif">
                                            Title
                                        </a>
                                    </th>
                                    <th><a href="
                                                    @if(request()->colName === 'keywords' and request()->order === 'desc')
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'keywords';
                                            $currentUrlQueries['order'] = 'asc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp
                                        @else
                                        @php
                                            $currentUrlQueries = request()->query();
                                            $currentUrlQueries['colName'] = 'keywords';
                                            $currentUrlQueries['order'] = 'desc';

                                            echo request()->fullUrlWithQuery($currentUrlQueries);
                                        @endphp
                                        @endif">
                                            Keywords
                                        </a>
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <form id="ordinance_form" method="get" action="#">
                                    @foreach(array_filter(request()->all(), function($k){ return !starts_with($k, 'col-'); }, ARRAY_FILTER_USE_KEY) as $k => $v)
                                        <input type="hidden" name="{{$k}}" value="{{ $v }}">
                                    @endforeach
                                    <td><input type="text" class="form-control" name="col-number"
                                               value="{{ request()->input('col-number')}}"></td>
                                    <td><input type="text" class="form-control" name="col-series"
                                               value="{{ request()->input('col-series')}}"></td>
                                    <td><input type="text" class="form-control" name="col-title"
                                               value="{{ request()->input('col-title') }}"></td>
                                    <td><input type="text" class="form-control" name="col-keywords"
                                               value="{{ request()->input('col-keywords') }}"></td>
                                    <td class="btn-group btn-group-xs">
                                        <input class="btn btn-sm btn-info" type="submit" value="Filter">

                                        <button type="submit"
                                                class="btn btn-success btn-blue mr-2" style="display: none">Go
                                        </button>

                                        <a href="{{ url()->current() }}" class="btn btn-sm btn-primary">
                                            {{--<i class="fa fa-refresh"></i>--}} <span>Reset</span>
                                        </a>
                                    </td>


                                </form>
                                @foreach($ordinances as $ordinance)
                                    <tr>
                                        <td class="information"><span> {{ $ordinance->number }} </span></td>
                                        <td class="information"><span> {{ $ordinance->series }} </span></td>
                                        <td class="justify">{{ str_limit($ordinance->title, $limit = 150, $end = '...') }}</td>
                                        <td class="information">{{ str_limit($ordinance->keywords, $limit = 150, $end = '...') }}</td>
                                        <td>
                                            <button onclick="window.location.href='/public/showOrdinance/{{$ordinance->id}}\ ' "
                                                    class="btn btn-info"><span>Read More</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 ">
                {{$ordinances->links()}}
            </div>
        </div>
    </section>

@endsection