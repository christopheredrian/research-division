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
    <div id="home-p" class="home-p pages-head3 text-center">
        <div class="container">
            <h1 class="" data-wow-delay="0.1s">Monitoring and Evaluation</h1>
            {{--<p>--}}
            {{----}}
            {{--</p>--}}
        </div><!--/end container-->
    </div>

    <!--====================================================
                          BUSINESS-GROWTH-P1
    ======================================================-->
    <section id="business-growth-p1" class="business-growth-p1 bg-white">
        <div class="container">
            <div class="row title-bar">
                <div class="col-md-12">

                    @if($ordinances !== null)
                        <div class="ordinance-heading">
                            @if( app('request')->input('status') === 'monitored')
                                <h1 class="wow fadeInUp">Monitored Ordinances</h1>
                                <div class="heading-border"></div>
                                <p class="" data-wow-delay="0.4s">
                                    These are ordinances that has already been monitored.
                                </p>
                            @else
                                <h1 class="wow fadeInUp">Ordinances Being Monitored</h1>
                                <div class="heading-border"></div>
                                <p class="" data-wow-delay="0.4s">
                                    These are the Ordinances currently being monitored. The Sangguniang Panlungsod ng
                                    Baguio is conducting a legislative monitoring and evaluation of the following
                                    ordinances. In this regard, may we solicit your comments and suggestions or
                                    recommendations in relation to the following ordinances.</p>
                                <p>If you click "Read More",
                                    you will be able to view the entirety of the ordinance being monitored
                                    and the comment section wherein you will input your comments and
                                    suggestions or recommendations about the ordinance.
                                </p>
                            @endif
                        </div>
                    @elseif ($resolutions !== null)
                        <div class="ordinance-heading">
                            @if( app('request')->input('status') === 'monitored')
                                <h1 class="wow fadeInUp">Monitored Resolutions</h1>
                                <div class="heading-border"></div>
                                <p class="" data-wow-delay="0.4s">
                                    These are resolutions that has already been monitored.
                                </p>
                            @else
                                <h1 class="wow fadeInUp">Resolutions Being Monitored</h1>
                                <div class="heading-border"></div>
                                <p class="" data-wow-delay="0.4s">
                                    These are the Resolutions currently being monitored. The Sangguniang Panlungsod ng
                                    Baguio is conducting a legislative monitoring and evaluation of the following
                                    resolutions. In this regard, may we solicit your comments and
                                    suggestions or recommendations in relation to the following resolutions.
                                </p>

                                <p>If you click "Read More",
                                    you will be able to view the entirety of the resolution being monitored
                                    and the comment section wherein you will input your comments and
                                    suggestions or recommendations about the resolution.
                                </p>
                            @endif
                        </div>
                    @endif


                    <div class=" col-md-12" style="margin-bottom: 10px">
                        <div class="row">
                            <div class=" col-md-7"></div>
                            <div class=" col-md-3">
                                <form id="search2" method="get" action="#" class="form-inline pull-right">
                                    @if( app('request')->input('status') === 'monitored')
                                        <input name="status" value="monitored" type="hidden">
                                    @endif
                                    <input name="q" value="{{ request()->q }}"
                                           class="form-control" type="search"
                                           placeholder="Search...">
                                    <button type="submit" onclick="submit()"
                                            class="btn btn-general btn-blue mr-2" style="display: none">Go
                                    </button>
                                </form>
                            </div>
                            <div class=" col-md-2">
                                <a style="min-width: 150px" href="{{ url()->current() }}" class="btn btn-primary">
                                    <i class="fa fa-refresh"></i> Reset Filtering
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    @if($ordinances !== null)
                        <div class="col-md-12">
                            @if($ordinances->first() === null)
                                <div class="row text-center">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <h1>No results found.</h1>
                                    </div>
                                    <br>
                                </div>
                            @endif
                            <table class="table table-hover table-condensed table-bordered">
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
                                <tr>
                                    <form id="obm" method="get" action="#">
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
                                        <td><input class="col-12 btn btn-primary" type="submit" value="Filter"></td>

                                        <button type="submit"
                                                class="btn btn-general btn-blue mr-2" style="display: none">Go
                                        </button>
                                    </form>
                                </tr>
                                @foreach($ordinances as $ordinance)
                                    <tr>
                                        <td class="information">{{ $ordinance->number }}</td>
                                        <td class="information">{{ $ordinance->series }}</td>
                                        <td>{{ str_limit($ordinance->title, $limit = 200, $end = '...') }}</td>
                                        <td class="information">{{ str_limit($ordinance->keywords, $limit = 200, $end = '...') }}</td>
                                        <td>
                                            <button style="width: 100%" onclick="window.location.href='/public/showOrdinance/{{$ordinance->id}}\ ' "
                                                    class="btn btn-info pull-right button-two">
                                                <span> <i class="fa fa-book"></i> Read More</span>
                                            </button>
                                            @if($ordinance->getQuestionnaire())
                                                <a class="btn btn-danger" href="/answer.o/{{ $ordinance->getQuestionnaire()->id  }}"> <i class="fa fa-reply"></i> Answer Questionnaire</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row text-center">
                                {{$ordinances->links()}}
                            </div>
                        </div>
                    @elseif ($resolutions !== null)
                        <div class="col-md-12">
                            @if($resolutions->first() === null)
                                <div class="row text-center">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <h1>No results found.</h1>
                                    </div>
                                    <br>
                                </div>
                            @endif
                            <table class="table table-striped table-bordered">
                                <thead>
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
                                            Resolution Number
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
                                <tr>
                                    <form id="rbm" method="get" action="#">
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
                                        <td><input class="col-12 btn btn-primary" type="submit" value="Filter"></td>

                                        <button type="submit"
                                                class="btn btn-general btn-blue mr-2" style="display: none">Go
                                        </button>
                                    </form>
                                </tr>

                                @foreach($resolutions as $resolution)
                                    <tr>
                                        <td class="information">{{ $resolution->number }}</td>
                                        <td class="information">{{ $resolution->series }}</td>
                                        <td>{{ str_limit($resolution->title, $limit = 200, $end = '...') }}</td>
                                        <td class="information">{{ str_limit($resolution->keywords, $limit = 200, $end = '...') }}</td>
                                        <td>
                                            <button style="width: 100%" onclick="window.location.href='/public/showResolution/{{$resolution->id}}\ ' "
                                                    class="btn btn-info pull-right button-two">
                                                <span> <i class="fa fa-book"></i> Read More</span>
                                            </button>
                                            @if($resolution->getQuestionnaire())
                                                <a class="btn btn-danger" href="/answer.r/{{ $resolution->getQuestionnaire()->id  }}"> <i class="fa fa-reply"></i> Answer Questionnaire</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="row text-center">
                                {{$resolutions->links()}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


@endsection