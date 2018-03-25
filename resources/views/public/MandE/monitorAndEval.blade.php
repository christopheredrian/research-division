@extends('layouts.public')

@section('styles')
    <style>
        form {
            display: inline;
        }

        form button {
            display: inline;
        }

        .information {
            text-align: center;
            vertical-align:middle !important;
            position: relative;
        }
        .button-two {
            border-radius: 4px;
            border: none;
            transition: all 0.5s;
        }

        .button-two span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }


        .button-two span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: -2px;
            right: -10px;
            transition: 0.5s;
        }

        .button-two:hover span {
            padding-right: 25px;
        }

        .button-two:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Monitoring & Evaluation</h1>
        </div>
        <div class="col-md-12" style="margin-bottom: 30px">
            <div class="pull-left">
                <a style="min-width: 150px" href="{{ url()->current() }}" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Reset Filtering
                </a>
            </div>
            <div class="pull-right">
                <form method="get" action="#" class="form-inline">
                    <input name="q" value="{{ request()->q }}" class="form-control" type="search"
                           placeholder="Search...">
                    <button class="btn" style="height: 35px; width: 35px; margin-right: 65px"><span
                                class="fa fa-search"></span></button>
                </form>
            </div><!-- /.col-lg-6 -->
        </div>
        <div class="col-md-12">
            @if($ordinances !== null)
                <div class="ordinance-heading">
                    <h1>Ordinances</h1>
                    <hr>
                </div>
                <div class="col-md-12">
                    @if($ordinances->first() !== null)
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
                                <form method="get" action="#">
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
                                                class="btn btn-info pull-right button-two"><span>Read More</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="row text-center">
                            {{$ordinances->links()}}
                        </div>
                    @else
                        <div class="row text-center">
                            <h1>No results found.</h1>
                        </div>
                    @endif
                </div>
            @elseif ($resolutions !== null)
                <div class="ordinance-heading">
                    <h1>Resolutions</h1>
                    <hr>
                </div>
                <div class="col-md-12">
                    @if($resolutions->first() !== null)
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
                                <form method="get" action="#">
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
                                                class="btn btn-info pull-right button-two"><span>Read More</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="row text-center">
                            {{$resolutions->links()}}
                        </div>
                    @else
                        <div class="row text-center">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <h1>No results found.</h1>
                            </div>
                        </div>
                    @endif
                </div>
                {{--@else--}}
                {{--<div class="resolution-heading">--}}
                {{--<h1>No Monitored ordinances or resolutions</h1>--}}
                {{--<hr>--}}
                {{--</div>--}}
            @endif
        </div>
    </div>
@endsection