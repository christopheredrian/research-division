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
    <link rel="shortcut icon" href="/pub2/img/favicon.ico">

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
</head>

<body id="page-top">

<!--====================================================
                         HEADER
======================================================-->

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
        <div class="container">
            <a class="navbar-brand smooth-scroll" href="/">

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

                    <li class="nav-item"><a class="nav-link smooth-scroll" href="/contact">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link smooth-scroll" href="/about">About Us</a></li>

                    <li>
                        <i id="ss" class="search fa fa-search search-btn"></i>
                        <div class="search-open">
                            <form id="search_form" action="/search" method="get">
                                <div class="input-group animated fadeInUp">
                                    <input name="q" type="text" id="s" class="form-control" placeholder="Search"
                                           aria-describedby="basic-addon2">
                                    <span type="submit" onclick="form_submit('search_form')" class="input-group-addon" id="basic-addon2">Go</span>
                                    <button type="submit" onclick="form_submit('search_form')" class="btn btn-general btn-blue mr-2" style="display: none">Go</button>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<!--====================================================
                      FOOTER
======================================================-->
<footer>
    <div id="footer-s1" class="footer-s1">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About Us -->
                    <div class="col-md-4 col-sm-6 ">
                        <div><img src="/pub2/img/logo-w.png" alt="" class="img-fluid"></div>
                        <ul class="list-unstyled comp-desc-f">
                            <li><p>Businessbox is a corporate business theme. You can customize what ever you think to
                                    make your website much better from your great ideas. </p></li>
                        </ul>
                        <br>
                    </div>
                    <!-- End About Us -->

                    <!-- Recent News -->
                    <div class="col-md-4 col-sm-6 ">
                        <div class="heading-footer"><h2>Useful Links</h2></div>
                        <ul class="list-unstyled link-list">
                            <li><a href="about.html">About us</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="project.html">Project</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="careers.html">Career</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="faq.html">FAQ</a><i class="fa fa-angle-right"></i></li>
                            <li><a href="contact.html">Contact us</a><i class="fa fa-angle-right"></i></li>
                        </ul>
                    </div>
                    <!-- End Recent list -->

                    <!-- Latest Tweets -->
                    <div class="col-md-4 col-sm-6">
                        <div class="heading-footer"><h2>Get In Touch</h2></div>
                        <address class="address-details-f">
                            25, Dist town Street, Logn <br>
                            California, US <br>
                            Phone: 800 123 3456 <br>
                            Fax: 800 123 3456 <br>
                            Email: <a href="mailto:sanggunianrd@gmail.com">sanggunianrd@gmail.com</a>
                        </address>
                        <ul class="list-inline social-icon-f top-data">
                            <li><a href="#" target="_empty"><i class="fa top-social fa-facebook"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Latest Tweets -->
                </div>
            </div><!--/container -->
        </div>
    </div>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="footer-copyrights">
                        <p>Copyrights &copy; 2018 All Rights Reserved by Baguio City Government.<a
                                    href="https://themewagon.com">Template by ThemeWagon</a></p>
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
<script>
    function submitform(x) {
        var f = document.getElementById(x);
        if (f.checkValidity()) {
            f.submit();
        } else {

        }
    }
</script>
@yield('scripts')
</body>

</html>
