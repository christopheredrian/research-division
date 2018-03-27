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
                                            <p> The Sangguniang Panlungsod, as the legislative body of the city,
                                                shall <em> enact ordinances, approve resolutions, and appropriate funds </em> for
                                                the general welfare of the city and inhabitants pursuant to <b>Section 16 of Republic Act No. 7160</b>
                                                or <b>Local Government Code of 1991</b> and in the proper exercise of the
                                                corporate powers of the city as provided for under <b>Section 22</b> of the said
                                                Code. The Local Legislators are expected to perform other roles as contained in the
                                                Local Legislators' Tool Kit and their Internal Rules of Procedure. </p>
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

                                            <p> The Research Division is one of the four (4) divisions of the Office of the Sangguniang
                                            Panlungsod that has the following functions:
                                            <ol>
                                                <li> Attends the meetings, public hearings, and otther related meetings
                                                    of the Sanggunian to assist in research work and gathers information for the Sanggunian;</li>
                                                <li> Performs research work referred to by the Sanggunian, various offices/agencies, and the
                                                    general public on approved ordinances and resolutions and other related documents;</li>
                                                <li> Keeps and maintains original copies of the City of Baguio's approved ordinances
                                                    and resolutions and other related documents;</li>
                                                <li> Encodes and maintains records in the SP-LMS database including
                                                    indices of approved ordinances and resolutions;</li>
                                                <li> Sends out copies of ordinances and resolutions to concerned persons/offices
                                                    for information/implementations;</li>
                                                <li> Sends out publications of approved ordinances; and </li>
                                                <li> Coordinates with other agencies/departments in gathering data.</li>
                                            </ol></p>
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
                                            <p> An ordinance is a local law that prescribes rules of conduct of a general,
                                            permanent character. It continues to be in force until repealed ot superseded
                                            by a subsequent enactment of the local legistlative body.</p>
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
                                            <p> A resolution is a mere expression of the opinion or sentiment of the local
                                            legislative body on matters relating to proprietary function and private concerns.
                                            It is temporary in character.</p>
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