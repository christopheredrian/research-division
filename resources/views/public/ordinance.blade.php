@extends('layouts.public')
@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ordinance">
                    <div class="ordinance-heading">
                        <h1>Ordinances</h1>
                    </div>
                    <div class="ordinance-right">
                        @foreach($ordinances as $ordinance)
                        <div class="ordinance-right-wrapper">
                            <h3>{{$ordinance->title}}</h3>
                            <p>{{$ordinance->authors}}</p>
                            <p>{{$ordinance->description}}</p>
                            <a href="{{ url('/public/showOrdinance' . $ordinance->id) }}" title="Read more"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Read More </button></a>
                        </div>
                        @endforeach
                        <hr>
                        {{--<div class="ordinance-right-wrapper">
                            <h3>Ordinance 1</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                            <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                        </div>
                        <hr>
                        <div class="ordinance-right-wrapper">
                            <h3>Ordinance 2</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                            <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                        </div>
                        <hr>
                        <div class="ordinance-right-wrapper">
                            <h3>Ordinance 3</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                            <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                        </div>
                        <hr>
                        <div class="ordinance-right-wrapper">
                            <h3>Ordinance 4</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                            <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                        </div>
                        <hr>
                        <div class="ordinance-right-wrapper">
                            <h3>Ordinance 5</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                            <button onclick="window.location.href='/sshowOrdinance'" class="btn btn-info">Read More</button>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<style>
    #content{
        background-color: rgb(240,248,255);
    }
</style>
@endsection