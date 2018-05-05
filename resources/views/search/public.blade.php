@extends('layouts.pub2')

@section('content')

    <!--====================================================
                   SERVICE-HOME
======================================================-->
    <section id="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 wow" data-wow-delay="0.3s">
                    <div class="service-h-desc">
                        <div class="row">
                            <div class=" col-md-7">
                                <h3>Search Results</h3>
                            </div>
                            <div class=" col-md-3">
                                <form id="search1" method="get" action="#" class="form-inline pull-right">
                                    <input name="q" value="{{ request()->q }}"
                                           class="form-control" type="search"
                                           placeholder="Search...">
                                    <button type="submit" onclick="form_submit('search1')"
                                            class="btn btn-general btn-blue mr-2"
                                            style="display: none">Go
                                    </button>
                                </form>
                            </div>
                            <div class=" col-md-2">
                                <a style="min-width: 150px" href="{{ url()->current() }}"
                                   class="btn btn-primary">
                                    <i class="fa fa-refresh"></i> Reset Filtering
                                </a>
                            </div>
                        </div>

                        <div class="heading-border-light"></div>

                        <div class="service-h-tab">
                            <nav class="nav nav-tabs" id="myTab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-expanded="true">
                                    R&R Ordinances
                                    ({{ $rnr_o->count() }})
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                   role="tab" aria-controls="nav-profile">
                                    R&R Resolutions
                                    ({{ $rnr_r->count() }})
                                </a>

                                <a class="nav-item nav-link" id="my-profile-tab" data-toggle="tab" href="#my-profile"
                                   role="tab" aria-controls="my-profile">
                                    M&E Ordinances
                                    ({{ $mne_o->count() }})
                                </a>

                                <a class="nav-item nav-link" id="my1-profile-tab" data-toggle="tab" href="#my1-profile"
                                   role="tab" aria-controls="my-profile">
                                    M&E Resolutions
                                    ({{ $mne_r->count() }})
                                </a>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    @if($rnr_o->count() !== 0)
                                        <table class="table table-hover dt-bootstrap">
                                            <thead>
                                            <tr>
                                                <th>Ordinance Number</th>
                                                <th>Series</th>
                                                <th>Title</th>
                                                <th>Keywords</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rnr_o as $item)
                                                <tr>
                                                    <td>{{ $item->number }}</td>
                                                    <td>{{ $item->series }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->keywords }}</td>
                                                    <td>
                                                        <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                                           href="{{ url('/public/showOrdinance/' . $item->id)}}">Read
                                                            More</a>
                                                        <br>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <h3 class="text-center">No Results Available</h3>
                                    @endif

                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">

                                    @if($rnr_r->count() !== 0)
                                        <table class="table table-hover dt-bootstrap">
                                            <thead>
                                            <tr>
                                                <th>Resolution Number</th>
                                                <th>Series</th>
                                                <th>Title</th>
                                                <th>Keywords</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rnr_r as $item)
                                                <tr>
                                                    <td>{{ $item->number }}</td>
                                                    <td>{{ $item->series }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->keywords }}</td>
                                                    <td>
                                                        <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                                           href="{{ url('/public/showResolution/' . $item->id)}}">Open
                                                            in new
                                                            Tab</a>
                                                        <br>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <h3 class="text-center">No Results Available</h3>
                                    @endif

                                </div>
                                <div class="tab-pane fade" id="my-profile" role="tabpanel"
                                     aria-labelledby="my-profile-tab">

                                    @if($mne_o->count() !== 0)
                                        <table class="table table-hover dt-bootstrap">
                                            <thead>
                                            <tr>
                                                <th>Ordinance Number</th>
                                                <th>Series</th>
                                                <th>Title</th>
                                                <th>Keywords</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($mne_o as $item)
                                                <tr>
                                                    <td>{{ $item->number }}</td>
                                                    <td>{{ $item->series }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->keywords }}</td>
                                                    <td>{!!  $item->isAccepting()  ? '<span class="label label-success">Monitoring</span>':
                                        '<span class="label label-danger">Not Monitoring</span>'!!}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-flat btn-sm btn-info" target="_blank"
                                                           href="{{ url('/public/showOrdinance/' . $item->id)}}">Open in
                                                            new Tab</a>
                                                        <br>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <h3 class="text-center">No Results Available</h3>
                                    @endif

                                </div>

                                <div class="tab-pane fade" id="my1-profile" role="tabpanel"
                                     aria-labelledby="my1-profile-tab">

                                    @if($mne_r->count() !== 0)
                                        <table class="table table-hover dt-bootstrap">
                                            <thead>
                                            <tr>
                                                <th>Resolution Number</th>
                                                <th>Series</th>
                                                <th>Title</th>
                                                <th>Keywords</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($mne_r as $item)
                                                <tr>
                                                    <td>{{ $item->number }}</td>
                                                    <td>{{ $item->series }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->keywords }}</td>
                                                    <td>{!!  $item->isAccepting()  ? '<span class="label label-success">Monitoring</span>':
                                        '<span class="label label-danger">Not Monitoring</span>'!!}
                                                    </td>
                                                    <td>
                                                        <a class="btn-flat btn btn-sm btn-info" target="_blank"
                                                           href="{{ url('/public/showResolution/' . $item->id)}}">Open
                                                            in new
                                                            Tab</a>
                                                        <br>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <h3 class="text-center">No Results Available</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection