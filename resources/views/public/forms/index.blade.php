@extends('layouts.pub2')

@section('content')
    <div class="container">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Questionnaires</h3>
            </div>
            <div class="box-body">

                <table class="table table-striped table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>Questionnaire Name</th>
                        <th>Assoc. Oridinance</th>
                        <th>Assoc. Resolution</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionnaires as $questionnaire)
                        <tr>
                            <td>{{ $questionnaire->name }}</td>
                            {{-- Refactore below --}}
                            <td> {{ $questionnaire->ordinance ? $questionnaire->ordinance->title : '-' }}</td>
                            <td> {{ $questionnaire->resolution ? $questionnaire->resolution->title : '-'}}</td>
                            <td>
                                    @if($questionnaire->isAccepting == 0)
                                    <span class="label label-danger">
                                        Not Accepting Responses
                                    </span>
                                    @else
                                    <span class="label label-success">
                                        Accepting Responses
                                    </span>
                                    @endif
                                </td>
                            <td>
                                <a href="/answer.o/{{ $questionnaire->id }}" class="btn btn-danger"> <i class="fa fa-reply"></i> Answer Questionnaire</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection