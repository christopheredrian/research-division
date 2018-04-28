@extends('layouts.pub2')

@section('content')
    <!--====================================================
                       HOME-P
    ======================================================-->
    <div id="home-p" class="home-p pages-head2 text-center">
        <div class="container">
            <h1 class="wow fadeInUp" data-wow-delay="0.1s">Businessbox is fully responsive and Clean</h1>
            <p>Our Services</p>
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
                            @else
                                <h1 class="wow fadeInUp">Ordinances Being Monitored</h1>
                            @endif
                        </div>
                    @elseif ($resolutions !== null)
                        <div class="ordinance-heading">
                            @if( app('request')->input('status') === 'monitored')
                                <h1 class="wow fadeInUp">Monitored Resolutions</h1>
                            @else
                                <h1 class="wow fadeInUp">Resolutions Being Monitored</h1>
                            @endif
                        </div>
                    @endif

                    <div class="heading-border"></div>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">We committed to helping you maintain your oral
                        healthTooth.We are an innovative company. We develop and design websites for costumers around
                        the world. Our clients are some of the most forward-looking companies in the world.</p>

                    <div class=" col-md-12" style="margin-bottom: 10px">
                        <div class="row">
                            <div class=" col-md-7"></div>
                            <div class=" col-md-3">
                                <form id="search2" method="get" action="#" class="form-inline pull-right">
                                    <input name="q" value="{{ request()->q }}"
                                           class="form-control" type="search"
                                           placeholder="Search...">
                                    <button type="submit" onclick="form_submit('search2')"
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
                            @else
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

                                                <button type="submit" onclick="form_submit('obm')"
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
                                                <button onclick="window.location.href='/public/showOrdinance/{{$ordinance->id}}\ ' "
                                                        class="btn btn-info pull-right button-two">
                                                    <span>Read More</span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row text-center">
                                    {{$ordinances->links()}}
                                </div>
                            @endif
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
                            @else
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
                                            <td><input class="btn btn-primary" type="submit" value="Filter"></td>

                                                <button type="submit" onclick="form_submit('rbm')"
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
                                                <button onclick="window.location.href='/public/showResolution/{{$resolution->id}}\ ' "
                                                        class="btn btn-info pull-right button-two">
                                                    <span>Read More</span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="row text-center">
                                    {{$resolutions->links()}}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


@endsection