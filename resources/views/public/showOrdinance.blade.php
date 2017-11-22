@extends('layouts.public')
@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ordinance">
                    <div class="ordinance-heading">
                        <h1>{{$ordinances->title}}</h1>
                    </div>
                    <div class="ordinasnce-right">
                        <div class="ordinance-right-wrapper">
                            <p> Authors: {{$ordinances->authors}}</p>
                            <p> Date Approved: {{$ordinances->date_approved_by_council}}</p>
                            <p> Date Signed by Vice Mayor: {{$ordinances->date_signed_by_vice_mayor}}</p>
                            <p> Date Signed by Mayor: {{$ordinances->date_signed_by_mayor}}</p>
                            <hr>
                            <p> {{$ordinances->description}} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="border-top: dotted lightseagreen; padding-top: 20px">
                <div class="pb-cmnt-container">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <form method="post" action="{{ url("/suggestions/{$ordinances->id }/") }}">
                                {{ csrf_field() }}
                                <input type="text" name="first_name" placeholder="Fname">
                                <input type="text" name="last_name" placeholder="Lname">
                                <input type="hidden" name="type" value="ordinance">
                                <input type="email" name="email" placeholder="email">
                                <textarea required class="form-control" name="suggestion" rows="5" placeholder="Please give us your suggestion on this ordinance"></textarea>
<br>
                                <div class="form-inline">
                                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-paper-plane"></i> Send Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #content{
        background-color: rgb(240,248,255);
    }
</style>
@endsection