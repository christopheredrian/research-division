@extends('layouts.pub2')

@section('content')
    <div class="container" style="margin-top: 40px">
        <!-- general form elements -->
        <h3>Questionnaires</h3>
        <p>Here are the listing of all the ordinances and resolutions that are currently being monitored.</p>

        <table class="table">
            <thead>
            <tr>
                <th>Ordinance/Resolution No.</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questionnaires as $questionnaire)
                <tr>
                    {{-- Refactore below --}}
                    @if($questionnaire->ordinance)
                        <td><span class="text-primary">Ordinance No. {{ $questionnaire->ordinance->number }}
                                . Series of {{ $questionnaire->ordinance->series }}</span></td>
                        <td> {{$questionnaire->ordinance->title}} </td>
                        <td>
                            <a class="btn btn-primary w-100"
                               href="/public/showOrdinance/{{ $questionnaire->ordinance->id }}"> <i
                                        class="fa fa-book"></i> Read More</a>

                            <a href="/answer.o/{{ $questionnaire->ordinance->id }}" class="btn btn-danger">
                                <i
                                        class="fa fa-reply"></i> Answer Questionnaire</a>

                        </td>
                    @elseif($questionnaire->resolution)
                        <td><span class="text-success">Resolution No. {{ $questionnaire->resolution->number }}. Series of {{ $questionnaire->resolution->series }} </span>
                        </td>
                        <td>{{ $questionnaire->resolution->title }}</td>
                        <td>
                            <a class="btn btn-primary w-100"
                               href="/public/showResolution/{{ $questionnaire->resolution->id }}"> <i
                                        class="fa fa-book"></i> Read More</a>

                            <a href="/answer.r/{{ $questionnaire->resolution->id }}" class="btn btn-danger">
                                <i
                                        class="fa fa-reply"></i> Answer Questionnaire</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $questionnaires->links() }}

    </div>
    </div>
@endsection