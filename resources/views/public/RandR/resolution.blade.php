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
                    <h1 class="wow fadeInUp">Resolutions</h1>
                    <div class="heading-border"></div>
                    <p class="wow fadeInUp" data-wow-delay="0.4s">

                        *CAPTION*

                    </p>

                    <div class="col-md-12" style="margin-bottom: 30px">
                        <div class="pull-right">
                            <a style="min-width: 150px" href="{{ url()->current() }}" class="btn btn-primary">
                                <i class="fa fa-refresh"></i> Reset Filtering
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="ordinance-right">
                        <div class="col-md-12">
                            @if($resolutions->first() === null)
                                <div class="row text-center">
                                    <h1>No results found.</h1>
                                </div>
                                <br>
                            @endif
                            <div class="table-responsive">
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

                                    <form id="resolutions_form" method="get" action="#">
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

                                        <button type="submit"
                                                class="btn btn-general btn-blue mr-2" style="display: none">Go
                                        </button>
                                    </form>

                                    @foreach($resolutions as $resolution)
                                        <tr>
                                            <td class="information"><span>{{ $resolution->number }}</span></td>
                                            <td class="information"><span>{{ $resolution->series }}</span></td>
                                            <td>
                                                <span>{{ str_limit($resolution->title, $limit = 150, $end = '...') }}</span>
                                            </td>
                                            <td class="information">
                                                <span>{{ str_limit($resolution->keywords, $limit = 150, $end = '...') }}</span>
                                            </td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection