@extends('layouts.public')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ordinance">

                        <div class="page-header">
                            <h1>Frequently Asked Questions (FAQs) </h1>
                        </div>
                        <div class="container ">
                            <div class="panel-group" id="faqAccordion">
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle question-toggle collapsed"
                                         data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                                        <h4 class="panel-title">
                                            <a href="#" class="ing">Q: What is the Sangguniang Panlungsod ng Baguio?</a>
                                        </h4>

                                    </div>
                                    <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <h5><span class="label label-primary">Answer</span></h5>
                                            <p> Answer here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle"
                                         data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                        <h4 class="panel-title">
                                            <a href="#" class="ing">Q: What is the Research Division?</a>
                                        </h4>

                                    </div>
                                    <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <h5><span class="label label-primary">Answer</span></h5>

                                            <p> Answer here. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle"
                                         data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                                        <h4 class="panel-title">
                                            <a href="#" class="ing">Q: What is the Research and Records division of the Research Division?</a>
                                        </h4>

                                    </div>
                                    <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <h5><span class="label label-primary">Answer</span></h5>

                                            <p> Answer here. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle"
                                         data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                        <h4 class="panel-title">
                                            <a href="#" class="ing">Q: What is the Monitoring and Evaluation division of the Research Division?</a>
                                        </h4>

                                    </div>
                                    <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <h5><span class="label label-primary">Answer</span></h5>
                                            <p> Answer here </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle"
                                         data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                        <h4 class="panel-title">
                                            <a href="#" class="ing">Q: What is an ordinance?</a>
                                        </h4>

                                    </div>
                                    <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <h5><span class="label label-primary">Answer</span></h5>
                                            <p> Answer here </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle"
                                         data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                        <h4 class="panel-title">
                                            <a href="#" class="ing">Q: What is a resolution?</a>
                                        </h4>

                                    </div>
                                    <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <h5><span class="label label-primary">Answer</span></h5>
                                            <p> Answer here </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <style>
            #content {
                background-color: rgb(240, 248, 255);
            }
        </style>
@endsection