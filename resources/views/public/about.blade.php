@extends('layouts.public')
@section('styles')
    <style>
        .footer {
            position: fixed;
            bottom: 0;
        }
        .square {
            height: 60px;
            width: 60px;
            border: 1px dashed white;
            margin: 0 0 0 55px;
            /*   padding: 1px; resize squares */
            background-color: rgba(255, 255, 255, 0.2);
            display: inline-block;
            transform: rotateZ(44deg);
        }

        .square:hover {
            background-color: rgba(27, 182, 239, 0.2);
            transition: ease 0.2s;
            cursor: pointer;
        }

        .square .icons {
            position: absolute;
            transform: rotateZ(-44deg);
            margin: 20px 0 0px 21px;
        }

        .fa-facebook,
        .fa-twitter,
        .fa-dribbbler,
        .fa-youtube,
        .fa-dribbble {
            width: 11px;
            height: 22px;
            color: white;
            font-family: FontAwesome;
            font-size: 23px;
            font-weight: 400;
            text-transform: uppercase;
        }

        .square:hover .fa-facebook {
            color: rgba(59, 89, 152, 1)
        }

        .square:hover .fa-twitter {
            color: rgba(27, 182, 239, 1)
        }

        .square:hover .fa-dribbble {
            color: rgba(199, 59, 111, 1)
        }

        .square:hover .fa-youtube {
            color: rgba(229, 45, 39, 1)
        }
        .logo{
            margin: 1em;
            position: fixed;
            bottom: -72px;
            z-index: 99999999999;
            right: 0;
        }
        svg{



        }
        .pen{
            fill:black;
            animation:rotateInDownLeft 3s forwards;
        }
        .all{
            animation:rotateOut 3s forwards;
        }
        @keyframes rotateInDownLeft {
            from {
                transform-origin: left bottom;
                transform: rotate3d(0,0,0, 0deg);
                opacity: 1;
            }

            to {
                -webkit-transform-origin: left bottom;
                transform-origin: left bottom;
                transform: ;
                transform:translateX(850px) translateY(-83px) rotate3d(0,0,1, -60deg);
                opacity: 1;
            }
        }
        @keyframes rotateOut {
            from {
                -webkit-transform-origin: center;
                transform-origin: center;
                opacity: 1;
            }

            to {
                -webkit-transform-origin: center;
                transform-origin: center;
                -webkit-transform: rotate3d(0, 0, 1, 90deg);
                transform: rotate3d(0, 0, 1, 90deg);
                opacity: 1;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
            <h2>About Us</h2>

            <div class=" aboutus col-md-6">
                <article>
                <p>
                    The Research Division<br>
                    Attends meetings, public hearings, and any other kind of meeting of the Sanggunian to help and do research work and gather information
                    for the Sanggunian. Research work are on approved ordinances and resolutions. We also maintain original copies of ordinances, resolutions and
                    other  related documents. Sends out copies of ordinances and resolutions to concerned offices/persons for implementaion or information,
                    We also send out publications of approved ordinances and resolutions. We also coordinate with other agencies for information collection.
                </p>
                <p>Telephone number: (074) 446-3366</p>
                </article>
                <div class="social_icons">
                    <div class="square">
                        <div class="icons">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-6">
                <h3><b> Mission </b></h3>
                <p>
                    "To enact oridnances, approve resolutions, and appropriate funds for the general welfare of the city and its inhabitants."
                </p>
                <h3><b> Vision </b></h3>
                <p>
                    "We envision quality legislation reflective of the aspirations of the people for a better quality of life in a clean and green environment."
                </p>
            </div>

    </div>
@endsection
