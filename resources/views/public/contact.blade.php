@extends('layouts.public')

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC7dvhrXSpMj_XFOeDt3DgmWuDG6JHewb4"></script>
    <script src="/js/script.js"></script>
    {{--<script src="/contactform/contactform.js"></script>--}}
    <script>
        // Top Search
        $("#ss").click(function (e) {
            e.preventDefault();
            $(this).toggleClass('current');
            $(".search-form").toggleClass('visible');
        });
    </script>
@endsection

@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--contact form-->
                    <div id="get-touch">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 ">
                                    <div class="get-touch-heading">
                                        <h2>Contact Us</h2>
                                        <p>Get in touch with us</p>
                                    </div>
                                </div>
                            </div>

                            <div class="content">
                                <div class="row">
                                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                                    <div id="errormessage"></div>

                                    <form action="/contact" method="post" role="form" class="form contactForm">
                                        {{ csrf_field() }}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" id="name"
                                                       placeholder="Your Name" data-rule="minlen:4"
                                                       data-msg="Please enter at least 4 chars" required/>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email"
                                                       placeholder="Your Email" data-rule="email"
                                                       data-msg="Please enter a valid email" required/>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input required type="text" class="form-control" name="subject" id="subject"
                                                       placeholder="Subject" data-rule="minlen:4"
                                                       data-msg="Please enter at least 8 chars of subject"/>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" rows="5"
                                                          data-rule="required" data-msg="Please write something for us"
                                                          placeholder="Message" required></textarea>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="submit">
                                            <button class="btn btn-default" type="submit">Send Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--contact-->
                    <div id="contact">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                                    <div class="contact-heading">
                                        <h2>Or Visit Us</h2>
                                        <p>Baguio City Hall, City Hall Dr, Baguio, Benguet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="google-map" data-latitude="16.414162" data-longitude="120.591581"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                                    <div class="contact-heading">
                                        <h2>Or Follow Us</h2>
                                        <p>at Facebook</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-12 col-lg-offset-5 col-sm-offset-4 col-md-offset-5">
                                <div class="social_icons">
                                    <div class="square">
                                        <div class="icons">
                                            <a target="_blank" href="https://facebook.com/InfoSentiA">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </div>
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

        .square {
            height: 60px;
            width: 60px;
            border: 1px dashed white;
            margin: 0 0 0 55px;
            /*   padding: 1px; resize squares */
            /*background-color: rgba(255, 255, 255, 0.2);*/
            display: inline-block;
            background-color: ;
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

        .fa-facebook {
            width: 11px;
            height: 22px;
            color: black;
            font-family: FontAwesome;
            font-size: 23px;
            font-weight: 400;
            text-transform: uppercase;
        }

        .square:hover .fa-facebook {
            color: rgba(59, 89, 152, 1)
        }

        svg {
        }

        @keyframes rotateInDownLeft {
            from {
                transform-origin: left bottom;
                transform: rotate3d(0, 0, 0, 0deg);
                opacity: 1;
            }

            to {
                -webkit-transform-origin: left bottom;
                transform-origin: left bottom;
                transform: ;
                transform: translateX(850px) translateY(-83px) rotate3d(0, 0, 1, -60deg);
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