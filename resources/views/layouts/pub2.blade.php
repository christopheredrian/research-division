<!--
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
-->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Research Division</title>
    <link rel="icon" href="/images/partgov.png">
    {{--<link rel="shortcut icon" href="/pub2/img/favicon.ico">--}}

    <!-- Global Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="/pub2/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/pub2/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/pub2/css/animate/animate.min.css">
    <link rel="stylesheet" href="/pub2/css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/pub2/css/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/pub2/css/style.css">
    {!! NoCaptcha::renderJs() !!}

    @yield('styles')

    <style>
        /*-=-=-=-=-=-=-=-=-=-=-=- */
        /* Column Grids */
        /*-=-=-=-=-=-=-=-=-=-=-=- */

        .col_half { width: 49%; }
        .col_third { width: 32%; }
        .col_fourth { width: 23.5%; }
        .col_fifth { width: 18.4%; }
        .col_sixth { width: 15%; }
        .col_three_fourth { width: 74.5%;}
        .col_twothird{ width: 66%;}
        .col_half,
        .col_third,
        .col_twothird,
        .col_fourth,
        .col_three_fourth,
        .col_fifth{
            position: relative;
            display:inline;
            display: inline-block;
            float: left;
            margin-right: 2%;
            margin-bottom: 20px;
        }
        .end { margin-right: 0 !important; }
        /* Column Grids End */

        .wrapper { width: 650px; margin: 30px auto; position: relative;}
        .counter { background-color: #ffffff; padding: 20px 0; border-radius: 5px;}
        .count-title { font-size: 40px; font-weight: normal;  margin-top: 10px; margin-bottom: 0; text-align: center; }
        .count-text { font-size: 13px; font-weight: normal;  margin-top: 10px; margin-bottom: 0; text-align: center; }
        .fa-2x { margin: 0 auto; float: none; display: table; color: #4ad1e5; }



        .pagination li {
            padding: 4px;
        }
        .pagination {
            margin-left: 50%;
        }

        .navbar-nav>li>a {
            font-size: 12px;
            font-weight: 500;
        }

        body {
            overflow-x: hidden;
        }

        .flex-image {
            width: 50%;
        }
        /* ----------- Non-Retina Screens ----------- */
        @media screen
        and (min-device-width: 1200px)
        and (max-device-width: 1600px)
        and (-webkit-min-device-pixel-ratio: 1) {
            .flex-image {
                width: 50%;
            }
        }

        /* ----------- Retina Screens ----------- */
        @media screen
        and (min-device-width: 1200px)
        and (max-device-width: 1600px)
        and (-webkit-min-device-pixel-ratio: 2)
        and (min-resolution: 192dpi) {
            .flex-image {
                width: 50%;
            }
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
            /* Styles */
        }

        /* Smartphones (landscape) ----------- */
        @media only screen and (min-width : 321px) {
            /* Styles */
        }

        /* Smartphones (portrait) ----------- */
        @media only screen and (max-width : 320px) {
            /* Styles */
        }

        /* iPads (portrait and landscape) ----------- */
        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
            /* Styles */
        }

        /* iPads (landscape) ----------- */
        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) {
            /* Styles */
        }

        /* iPads (portrait) ----------- */
        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) {
            /* Styles */
        }
        /**********
        iPad 3
        **********/
        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : landscape) and (-webkit-min-device-pixel-ratio : 2) {
            /* Styles */
        }

        @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) and (-webkit-min-device-pixel-ratio : 2) {
            /* Styles */
        }

        /* Desktops and laptops ----------- */
        @media only screen  and (min-width : 1224px) {
            /* Styles */
            .flex-image {
                width: 50%;
            }
        }

        /* Large screens ----------- */
        @media only screen  and (min-width : 1824px) {
            /* Styles */
            .flex-image {
                width: 50%;
            }
        }

        /* iPhone 4 ----------- */
        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) and (orientation : landscape) and (-webkit-min-device-pixel-ratio : 2) {
            /* Styles */
        }

        @media only screen and (min-device-width : 320px) and (max-device-width : 480px) and (orientation : portrait) and (-webkit-min-device-pixel-ratio : 2) {
            /* Styles */
        }

        /* iPhone 5 ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-height: 568px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        @media only screen and (min-device-width: 320px) and (max-device-height: 568px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        /* iPhone 6 ----------- */
        @media only screen and (min-device-width: 375px) and (max-device-height: 667px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        @media only screen and (min-device-width: 375px) and (max-device-height: 667px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        /* iPhone 6+ ----------- */
        @media only screen and (min-device-width: 414px) and (max-device-height: 736px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        @media only screen and (min-device-width: 414px) and (max-device-height: 736px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        /* Samsung Galaxy S3 ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 2){
            /* Styles */
        }

        /* Samsung Galaxy S4 ----------- */
        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 3){
            /* Styles */
        }

        @media only screen and (min-device-width: 320px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3){
            /* Styles */
        }

        /* Samsung Galaxy S5 ----------- */
        @media only screen and (min-device-width: 360px) and (max-device-height: 640px) and (orientation : landscape) and (-webkit-device-pixel-ratio: 3){
            /* Styles */
        }

        @media only screen and (min-device-width: 360px) and (max-device-height: 640px) and (orientation : portrait) and (-webkit-device-pixel-ratio: 3){
            /* Styles */
        }

    </style>
</head>

<body id="page-top">

<!--====================================================
                         HEADER
======================================================-->

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
        <div class="container">
            <a class="navbar-brand smooth-scroll text-center" href="/">
                {{--<strong>I</strong>nfo<strong>S</strong>enti<strong>A</strong> <br>--}}
                {{--<p> Sangguniang Panglungsod ng Baguio<br>--}}
                {{--Research Division</p>--}}
                <img class="flex-image" src="/pub2/img/new-hero-logo.png"/>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="/">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Legislations</a>
                        <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/randr/ordinances">Ordinances</a>
                            <a class="dropdown-item" href="/randr/resolutions">Resolutions</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Monitoring & Evaluation</a>
                        <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/ordinances">Ordinances being Monitored</a>
                            <a class="dropdown-item" href="/resolutions">Resolutions being Monitored</a>
                            <a class="dropdown-item" href="/ordinances?status=monitored">Monitored Ordinances</a>
                            <a class="dropdown-item" href="/resolutions?status=monitored">Monitored Resolutions</a>
                        </div>
                    </li>

                    @if (\App\Page::all()->count() > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle smooth-scroll" href="#" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                            <div class="dropdown-menu dropdown-cust" aria-labelledby="navbarDropdownMenuLink">
                                @foreach(\App\Page::all() as $page)
                                    <a class="dropdown-item" href="/page/{{$page->id}}">{{ $page->title }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                    {{--<li class="nav-item"><a class="nav-link smooth-scroll" href="/faqs">FAQs</a></li>--}}
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="/contact">Contact Us</a></li>

                    <li>
                        <i id="ss" class="search fa fa-search search-btn"></i>
                        <div class="search-open">
                            <form id="search_form" action="/search" method="get">
                                <div class="input-group animated fadeInUp">
                                    <input name="q" type="text" id="s" class="form-control" placeholder="Search"
                                           aria-describedby="basic-addon2">
                                    <span class="input-group-addon" id="basic-addon2">Go</span>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
@yield('content')
</body>

<!--====================================================
                      FOOTER
======================================================-->
<footer>
    <div id="footer-s1" class="footer-s1">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img style="max-width: 60%" src="/images/client/Ph_seal_Baguio.png"/>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="heading-footer"><h2>Get In Touch</h2></div>
                        <address class="address-details-f">
                            Address: 2nd floor, City Hall, Baguio City<br>
                            Contact No. : 446-3366<br>
                            Email: <a href="mailto:sanggunianrd@gmail.com">sanggunianrd@gmail.com</a><br>
                            Workdays: Monday-Friday (8:00am - 5:00pm)
                        </address>
                        <ul class="list-inline social-icon-f top-data">
                            <li><a href="#" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
                        </ul>
                    </div>


                    <div class="col-md-2 col-sm-6">
                        <div class="heading-footer"><h2>Visitor Counter</h2></div>
                        <div class="wrapper">
                            <div class="counter col_fourth">
                                <h2 class="timer count-title count-number" data-to="{{ \App\Log::where('user','public')->distinct()->count('ip')}}" data-speed="1500"></h2>
                                <p class="count-text ">and still counting!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/container -->
        </div>
    </div>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="footer-copyrights">
                        <p>Copyright &copy; 2018 All Rights Reserved by the SANGGUNIANG PANLUNSOD, City of Baguio, Research Division.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#home" id="back-to-top" class="btn btn-sm btn-green btn-back-to-top smooth-scrolls hidden-sm hidden-xs"
       title="home" role="button">
        <i class="fa fa-angle-up"></i>
    </a>
</footer>

<!--Global JavaScript -->
<script src="/pub2/js/jquery/jquery.min.js"></script>
<script src="/pub2/js/popper/popper.min.js"></script>
<script src="/pub2/js/bootstrap/bootstrap.min.js"></script>
<script src="/pub2/js/wow/wow.min.js"></script>
<script src="/pub2/js/owl-carousel/owl.carousel.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/pub2/js/jquery-easing/jquery.easing.min.js"></script>
<script src="/pub2/js/custom.js"></script>
@yield('scripts')
<script>
    (function ($) {
        $.fn.countTo = function (options) {
            options = options || {};

            return $(this).each(function () {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from:            $(this).data('from'),
                    to:              $(this).data('to'),
                    speed:           $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals:        $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,               // the number the element should start at
            to: 0,                 // the number the element should end at
            speed: 1000,           // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,           // the number of decimal places to show
            formatter: formatter,  // handler for formatting the value before rendering
            onUpdate: null,        // callback method for every time the element is updated
            onComplete: null       // callback method for when the element finishes updating
        };

        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }
    }(jQuery));

    jQuery(function ($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });

    /**
    * Quick Fix for all pagination links
    * This will convert the classes from bootstrap 3 to bootstrap 4 compatible classes
    */
    $(document).ready(function(){
        
        $.each($('ul.pagination li span'), function(i, val){
            var temp = $(val).text();
            $(val).html('<a>' + temp + '</a>');
        });
        
        $('ul.pagination li').addClass('page-item');
        $('ul.pagination li a').addClass('page-link');
    });
</script>
</body>

</html>
