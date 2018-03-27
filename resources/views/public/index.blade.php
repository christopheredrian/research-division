@extends('layouts.public')

@section('styles')
    <style>
        .ordinance-right-wrapper p {
            font-size: 20px;
        }

        .button-two {
            border-radius: 4px;
            border: none;
            transition: all 0.5s;
        }

        .button-two span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button-two span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button-two:hover span {
            padding-right: 25px;
        }

        .button-two:hover span:after {
            opacity: 1;
            right: 0;
        }

        .fnc {
            /* you can add color names and their values here
            and then simply add classes like .m--blend-$colorName to .fnc-slide
            to apply specific color for mask blend mode */
        }
        .fnc-slider {
            overflow: hidden;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: relative;
            height: 75vh;
        }
        .fnc-slider *, .fnc-slider *:before, .fnc-slider *:after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .fnc-slider__slides {
            position: relative;
            height: 100%;
            -webkit-transition: -webkit-transform 1s 0.6666666667s;
            transition: -webkit-transform 1s 0.6666666667s;
            transition: transform 1s 0.6666666667s;
            transition: transform 1s 0.6666666667s, -webkit-transform 1s 0.6666666667s;
        }
        .fnc-slider .m--blend-dark .fnc-slide__inner {
            background-color: #8a8a8a;
        }
        .fnc-slider .m--blend-dark .fnc-slide__mask-inner {
            background-color: #575757;
        }
        .fnc-slider .m--navbg-dark {
            background-color: #575757;
        }
        .fnc-slider .m--blend-green .fnc-slide__inner {
            background-color: #6d9b98;
        }
        .fnc-slider .m--blend-green .fnc-slide__mask-inner {
            background-color: #42605E;
        }
        .fnc-slider .m--navbg-green {
            background-color: #42605E;
        }
        .fnc-slider .m--blend-red .fnc-slide__inner {
            background-color: #ea2329;
        }
        .fnc-slider .m--blend-red .fnc-slide__mask-inner {
            background-color: #990e13;
        }
        .fnc-slider .m--navbg-red {
            background-color: #990e13;
        }
        .fnc-slider .m--blend-blue .fnc-slide__inner {
            background-color: #59aecb;
        }
        .fnc-slider .m--blend-blue .fnc-slide__mask-inner {
            background-color: #2D7791;
        }
        .fnc-slider .m--navbg-blue {
            background-color: #2D7791;
        }
        .fnc-slide {
            overflow: hidden;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .fnc-slide.m--before-sliding {
            z-index: 2 !important;
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
        }
        .fnc-slide.m--active-slide {
            z-index: 1;
            -webkit-transition: -webkit-transform 1s 0.6666666667s ease-in-out;
            transition: -webkit-transform 1s 0.6666666667s ease-in-out;
            transition: transform 1s 0.6666666667s ease-in-out;
            transition: transform 1s 0.6666666667s ease-in-out, -webkit-transform 1s 0.6666666667s ease-in-out;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .fnc-slide__inner {
            position: relative;
            height: 100%;
            background-size: cover;
            background-position: center top;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .m--global-blending-active .fnc-slide__inner, .m--blend-bg-active .fnc-slide__inner {
            background-blend-mode: luminosity;
        }
        .m--before-sliding .fnc-slide__inner {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
        }
        .m--active-slide .fnc-slide__inner {
            -webkit-transition: -webkit-transform 1s 0.6666666667s ease-in-out;
            transition: -webkit-transform 1s 0.6666666667s ease-in-out;
            transition: transform 1s 0.6666666667s ease-in-out;
            transition: transform 1s 0.6666666667s ease-in-out, -webkit-transform 1s 0.6666666667s ease-in-out;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .fnc-slide__mask {
            overflow: hidden;
            z-index: 1;
            position: absolute;
            right: 60%;
            top: 15%;
            width: 50.25vh;
            height: 67vh;
            margin-right: -90px;
            -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 0 0, 6vh 0, 6vh 61vh, 44vh 61vh, 44vh 6vh, 6vh 6vh);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 0 0, 6vh 0, 6vh 61vh, 44vh 61vh, 44vh 6vh, 6vh 6vh);
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
        }
        .m--before-sliding .fnc-slide__mask {
            -webkit-transform: rotate(-10deg) translate3d(200px, 0, 0);
            transform: rotate(-10deg) translate3d(200px, 0, 0);
            opacity: 0;
        }
        .m--active-slide .fnc-slide__mask {
            -webkit-transition: opacity 0.35s 1.2222222222s, -webkit-transform 0.7s 1.2222222222s;
            transition: opacity 0.35s 1.2222222222s, -webkit-transform 0.7s 1.2222222222s;
            transition: transform 0.7s 1.2222222222s, opacity 0.35s 1.2222222222s;
            transition: transform 0.7s 1.2222222222s, opacity 0.35s 1.2222222222s, -webkit-transform 0.7s 1.2222222222s;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            opacity: 1;
        }
        .m--previous-slide .fnc-slide__mask {
            -webkit-transition: opacity 0.35s 0.6833333333s, -webkit-transform 0.7s 0.3333333333s;
            transition: opacity 0.35s 0.6833333333s, -webkit-transform 0.7s 0.3333333333s;
            transition: transform 0.7s 0.3333333333s, opacity 0.35s 0.6833333333s;
            transition: transform 0.7s 0.3333333333s, opacity 0.35s 0.6833333333s, -webkit-transform 0.7s 0.3333333333s;
            -webkit-transform: rotate(10deg) translate3d(-200px, 0, 0);
            transform: rotate(10deg) translate3d(-200px, 0, 0);
            opacity: 0;
        }
        .fnc-slide__mask-inner {
            z-index: -1;
            position: absolute;
            left: 50%;
            top: 50%;
            width: 100vw;
            height: 100vh;
            margin-left: -50vw;
            margin-top: -50vh;
            background-size: cover;
            background-position: center center;
            background-blend-mode: luminosity;
            -webkit-transform-origin: 50% 16.5vh;
            transform-origin: 50% 16.5vh;
            -webkit-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
        }
        .m--before-sliding .fnc-slide__mask-inner {
            -webkit-transform: translateY(0) rotate(10deg) translateX(-200px) translateZ(0);
            transform: translateY(0) rotate(10deg) translateX(-200px) translateZ(0);
        }
        .m--active-slide .fnc-slide__mask-inner {
            -webkit-transition: -webkit-transform 0.7s 1.2222222222s;
            transition: -webkit-transform 0.7s 1.2222222222s;
            transition: transform 0.7s 1.2222222222s;
            transition: transform 0.7s 1.2222222222s, -webkit-transform 0.7s 1.2222222222s;
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
        .m--previous-slide .fnc-slide__mask-inner {
            -webkit-transition: -webkit-transform 0.7s 0.3333333333s;
            transition: -webkit-transform 0.7s 0.3333333333s;
            transition: transform 0.7s 0.3333333333s;
            transition: transform 0.7s 0.3333333333s, -webkit-transform 0.7s 0.3333333333s;
            -webkit-transform: translateY(0) rotate(-10deg) translateX(200px) translateZ(0);
            transform: translateY(0) rotate(-10deg) translateX(200px) translateZ(0);
        }
        .fnc-slide__content {
            z-index: 2;
            position: absolute;
            left: 40%;
            top: 40%;
        }
        .fnc-slide__heading {
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .fnc-slide__heading-line {
            overflow: hidden;
            position: relative;
            padding-right: 20px;
            font-size: 100px;
            color: #000;
            word-spacing: 10px;
        }
        .fnc-slide__heading-line:nth-child(2) {
            padding-left: 30px;
        }
        .m--before-sliding .fnc-slide__heading-line {
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
        }
        .m--active-slide .fnc-slide__heading-line {
            -webkit-transition: -webkit-transform 1.5s 1s;
            transition: -webkit-transform 1.5s 1s;
            transition: transform 1.5s 1s;
            transition: transform 1.5s 1s, -webkit-transform 1.5s 1s;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        .m--previous-slide .fnc-slide__heading-line {
            -webkit-transition: -webkit-transform 1.5s;
            transition: -webkit-transform 1.5s;
            transition: transform 1.5s;
            transition: transform 1.5s, -webkit-transform 1.5s;
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
        }
        .fnc-slide__heading-line span {
            display: block;
        }
        .m--before-sliding .fnc-slide__heading-line span {
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
        }
        .m--active-slide .fnc-slide__heading-line span {
            -webkit-transition: -webkit-transform 1.5s 1s;
            transition: -webkit-transform 1.5s 1s;
            transition: transform 1.5s 1s;
            transition: transform 1.5s 1s, -webkit-transform 1.5s 1s;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        .m--previous-slide .fnc-slide__heading-line span {
            -webkit-transition: -webkit-transform 1.5s;
            transition: -webkit-transform 1.5s;
            transition: transform 1.5s;
            transition: transform 1.5s, -webkit-transform 1.5s;
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
        }
        .fnc-slide__action-btn {
            position: relative;
            margin-left: 200px;
            padding: 5px 15px;
            font-size: 20px;
            line-height: 1;
            color: transparent;
            border: none;
            text-transform: uppercase;
            background: transparent;
            cursor: pointer;
            text-align: center;
            outline: none;
        }
        .fnc-slide__action-btn span {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            -webkit-perspective: 1000px;
            perspective: 1000px;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-transition: -webkit-transform 0.3s;
            transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            transition: transform 0.3s, -webkit-transform 0.3s;
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0;
            line-height: 30px;
            color: #fff;
        }
        .fnc-slide__action-btn span:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: 2px solid #fff;
            border-top: none;
            border-bottom: none;
        }
        .fnc-slide__action-btn span:after {
            content: attr(data-text);
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            line-height: 30px;
            background: #1F2833;
            opacity: 0;
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: translateY(100%) rotateX(-90deg);
            transform: translateY(100%) rotateX(-90deg);
            -webkit-transition: opacity 0.15s 0.15s;
            transition: opacity 0.15s 0.15s;
        }
        .fnc-slide__action-btn:hover span {
            -webkit-transform: rotateX(90deg);
            transform: rotateX(90deg);
        }
        .fnc-slide__action-btn:hover span:after {
            opacity: 1;
            -webkit-transition: opacity 0.15s;
            transition: opacity 0.15s;
        }
        .fnc-nav {
            z-index: 5;
            position: absolute;
            right: 0;
            bottom: 0;
        }
        .fnc-nav__bgs {
            z-index: -1;
            overflow: hidden;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }
        .fnc-nav__bg {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }
        .fnc-nav__bg.m--nav-bg-before {
            z-index: 2 !important;
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
        }
        .fnc-nav__bg.m--active-nav-bg {
            z-index: 1;
            -webkit-transition: -webkit-transform 1s 0.6666666667s;
            transition: -webkit-transform 1s 0.6666666667s;
            transition: transform 1s 0.6666666667s;
            transition: transform 1s 0.6666666667s, -webkit-transform 1s 0.6666666667s;
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
        .fnc-nav__controls {
            font-size: 0;
        }
        .fnc-nav__control {
            overflow: hidden;
            position: relative;
            display: inline-block;
            vertical-align: top;
            width: 100px;
            height: 50px;
            font-size: 14px;
            color: #fff;
            text-transform: uppercase;
            background: transparent;
            border: none;
            outline: none;
            cursor: pointer;
            -webkit-transition: background-color 0.5s;
            transition: background-color 0.5s;
        }
        .fnc-nav__control.m--active-control {
            background: #1F2833;
        }
        .fnc-nav__control-progress {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #fff;
            -webkit-transform-origin: 0 50%;
            transform-origin: 0 50%;
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transition-timing-function: linear !important;
            transition-timing-function: linear !important;
        }
        .m--with-autosliding .m--active-control .fnc-nav__control-progress {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
        }
        .m--prev-control .fnc-nav__control-progress {
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            -webkit-transition: -webkit-transform 0.5s !important;
            transition: -webkit-transform 0.5s !important;
            transition: transform 0.5s !important;
            transition: transform 0.5s, -webkit-transform 0.5s !important;
        }
        .m--reset-progress .fnc-nav__control-progress {
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transition: -webkit-transform 0s 0s !important;
            transition: -webkit-transform 0s 0s !important;
            transition: transform 0s 0s !important;
            transition: transform 0s 0s, -webkit-transform 0s 0s !important;
        }
        .m--autosliding-blocked .fnc-nav__control-progress {
            -webkit-transition: all 0s 0s !important;
            transition: all 0s 0s !important;
            -webkit-transform: scaleX(0) !important;
            transform: scaleX(0) !important;
        }

        /* NOT PART OF COMMON SLIDER STYLES */
        body {
            margin: 0;
        }

        .demo-cont {
            overflow: hidden;
            position: relative;
            height: 75vh;
            -webkit-perspective: 1500px;
            perspective: 1500px;
            background: #000;
        }
        .demo-cont__credits {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow-y: auto;
            z-index: 1;
            position: absolute;
            right: 0;
            top: 0;
            width: 400px;
            height: 100%;
            padding: 20px 10px 30px;
            background: #303030;
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
            color: #fff;
            text-align: center;
            -webkit-transition: -webkit-transform 0.7s;
            transition: -webkit-transform 0.7s;
            transition: transform 0.7s;
            transition: transform 0.7s, -webkit-transform 0.7s;
            -webkit-transform: translate3d(100%, 0, 0) rotateY(-45deg);
            transform: translate3d(100%, 0, 0) rotateY(-45deg);
            will-change: transform;
        }
        .credits-active .demo-cont__credits {
            -webkit-transition: -webkit-transform 0.7s 0.2333333333s;
            transition: -webkit-transform 0.7s 0.2333333333s;
            transition: transform 0.7s 0.2333333333s;
            transition: transform 0.7s 0.2333333333s, -webkit-transform 0.7s 0.2333333333s;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .demo-cont__credits *, .demo-cont__credits *:before, .demo-cont__credits *:after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .demo-cont__credits-close {
            position: absolute;
            right: 20px;
            top: 20px;
            width: 28px;
            height: 28px;
            cursor: pointer;
        }
        .demo-cont__credits-close:before, .demo-cont__credits-close:after {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 2px;
            margin-top: -1px;
            background: #fff;
        }
        .demo-cont__credits-close:before {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .demo-cont__credits-close:after {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .demo-cont__credits-heading {
            text-transform: uppercase;
            font-size: 40px;
            margin-bottom: 20px;
        }
        .demo-cont__credits-img {
            display: block;
            width: 60%;
            margin: 0 auto 30px;
            border-radius: 10px;
        }
        .demo-cont__credits-name {
            margin-bottom: 20px;
            font-size: 30px;
        }
        .demo-cont__credits-link {
            display: block;
            margin-bottom: 10px;
            font-size: 24px;
            color: #fff;
        }
        .demo-cont__credits-blend {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .example-slider {
            z-index: 2;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            -webkit-transition: -webkit-transform 0.7s;
            transition: -webkit-transform 0.7s;
            transition: transform 0.7s;
            transition: transform 0.7s, -webkit-transform 0.7s;
        }
        .credits-active .example-slider {
            -webkit-transform: translate3d(-400px, 0, 0) rotateY(10deg) scale(0.9);
            transform: translate3d(-400px, 0, 0) rotateY(10deg) scale(0.9);
        }
        .example-slider .fnc-slide-1 .fnc-slide__inner,
        .example-slider .fnc-slide-1 .fnc-slide__mask-inner {
            background-image: url("https://www.publicdomainpictures.net/pictures/190000/velka/burnham-park.jpg");


        }
        .example-slider .fnc-slide-2 .fnc-slide__inner,
        .example-slider .fnc-slide-2 .fnc-slide__mask-inner {
            background-image: url("https://upload.wikimedia.org/wikipedia/commons/a/a4/Burnham_Park_lake_2004.jpg");

        }
        .example-slider .fnc-slide-3 .fnc-slide__inner,
        .example-slider .fnc-slide-3 .fnc-slide__mask-inner {
           background-image: url("https://upload.wikimedia.org/wikipedia/commons/f/f4/LeonBaguio.JPG");
        }
        .example-slider .fnc-slide-3 .fnc-slide__inner:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
        }
        .example-slider .fnc-slide-4 .fnc-slide__inner,
        .example-slider .fnc-slide-4 .fnc-slide__mask-inner {
            background-image: url("https://upload.wikimedia.org/wikipedia/commons/9/92/Bagio_Cathedral.jpg");
        }
        .example-slider .fnc-slide-4 .fnc-slide__inner:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
        }
        .example-slider .fnc-slide__heading,
        .example-slider .fnc-slide__action-btn,
        .example-slider .fnc-nav__control {
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
        }

        /* COLORFUL SWITCH STYLES
           ORIGINAL DEMO - https://codepen.io/suez/pen/WQjwOb */
        .colorful-switch {
            position: relative;
            width: 180px;
            height: 77.1428571429px;
            margin: 0 auto;
            border-radius: 32.1428571429px;
            background: #cfcfcf;
        }
        .colorful-switch:before {
            content: "";
            z-index: -1;
            position: absolute;
            left: -5px;
            top: -5px;
            width: 190px;
            height: 87.1428571429px;
            border-radius: 37.1428571429px;
            background: #314239;
            -webkit-transition: background-color 0.3s;
            transition: background-color 0.3s;
        }
        .colorful-switch:hover:before {
            background: #4C735F;
        }
        .colorful-switch__checkbox {
            z-index: -10;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
        .colorful-switch__label {
            z-index: 1;
            overflow: hidden;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border-radius: 32.1428571429px;
            cursor: pointer;
        }
        .colorful-switch__bg {
            position: absolute;
            left: 0;
            top: 0;
            width: 540px;
            height: 100%;
            background: linear-gradient(90deg, #14DCD6 0, #10E7BD 180px, #EF9C29 360px, #E76339 100%);
            -webkit-transition: -webkit-transform 0.5s;
            transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            transition: transform 0.5s, -webkit-transform 0.5s;
            -webkit-transform: translate3d(-360px, 0, 0);
            transform: translate3d(-360px, 0, 0);
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__bg {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .colorful-switch__dot {
            position: absolute;
            left: 131.1428571429px;
            top: 50%;
            width: 5.1428571429px;
            height: 5.1428571429px;
            margin-left: -2.5714285714px;
            margin-top: -2.5714285714px;
            border-radius: 50%;
            background: #fff;
            -webkit-transition: -webkit-transform 0.5s;
            transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            transition: transform 0.5s, -webkit-transform 0.5s;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__dot {
            -webkit-transform: translate3d(-80.3571428571px, 0, 0);
            transform: translate3d(-80.3571428571px, 0, 0);
        }
        .colorful-switch__on {
            position: absolute;
            left: 104.1428571429px;
            top: 22.5px;
            width: 19.2857142857px;
            height: 36px;
            -webkit-transition: -webkit-transform 0.5s;
            transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            transition: transform 0.5s, -webkit-transform 0.5s;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__on {
            -webkit-transform: translate3d(-80.3571428571px, 0, 0);
            transform: translate3d(-80.3571428571px, 0, 0);
        }
        .colorful-switch__on__inner {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-transition: -webkit-transform 0.25s 0s cubic-bezier(0.52, -0.96, 0.51, 1.28);
            transition: -webkit-transform 0.25s 0s cubic-bezier(0.52, -0.96, 0.51, 1.28);
            transition: transform 0.25s 0s cubic-bezier(0.52, -0.96, 0.51, 1.28);
            transition: transform 0.25s 0s cubic-bezier(0.52, -0.96, 0.51, 1.28), -webkit-transform 0.25s 0s cubic-bezier(0.52, -0.96, 0.51, 1.28);
            -webkit-transform-origin: 100% 50%;
            transform-origin: 100% 50%;
            -webkit-transform: rotate(45deg) scale(0) translateZ(0);
            transform: rotate(45deg) scale(0) translateZ(0);
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__on__inner {
            -webkit-transition: -webkit-transform 0.25s 0.25s cubic-bezier(0.67, -0.16, 0.47, 1.61);
            transition: -webkit-transform 0.25s 0.25s cubic-bezier(0.67, -0.16, 0.47, 1.61);
            transition: transform 0.25s 0.25s cubic-bezier(0.67, -0.16, 0.47, 1.61);
            transition: transform 0.25s 0.25s cubic-bezier(0.67, -0.16, 0.47, 1.61), -webkit-transform 0.25s 0.25s cubic-bezier(0.67, -0.16, 0.47, 1.61);
            -webkit-transform: rotate(45deg) scale(1) translateZ(0);
            transform: rotate(45deg) scale(1) translateZ(0);
        }
        .colorful-switch__on__inner:before, .colorful-switch__on__inner:after {
            content: "";
            position: absolute;
            border-radius: 2.5714285714px;
            background: #fff;
        }
        .colorful-switch__on__inner:before {
            left: 0;
            bottom: 0;
            width: 100%;
            height: 6.1428571429px;
        }
        .colorful-switch__on__inner:after {
            right: 0;
            top: 0;
            width: 6.1428571429px;
            height: 100%;
        }
        .colorful-switch__off {
            position: absolute;
            left: 131.1428571429px;
            top: 50%;
            width: 41.1428571429px;
            height: 41.1428571429px;
            margin-left: -20.5714285714px;
            margin-top: -20.5714285714px;
            -webkit-transition: -webkit-transform 0.5s;
            transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            transition: transform 0.5s, -webkit-transform 0.5s;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__off {
            -webkit-transform: translate3d(-80.3571428571px, 0, 0);
            transform: translate3d(-80.3571428571px, 0, 0);
        }
        .colorful-switch__off:before, .colorful-switch__off:after {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 5.1428571429px;
            margin-top: -2.5714285714px;
            border-radius: 2.5714285714px;
            background: #fff;
            -webkit-transition: -webkit-transform 0.25s 0.25s;
            transition: -webkit-transform 0.25s 0.25s;
            transition: transform 0.25s 0.25s;
            transition: transform 0.25s 0.25s, -webkit-transform 0.25s 0.25s;
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__off:before, .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__off:after {
            -webkit-transition-delay: 0s;
            transition-delay: 0s;
        }
        .colorful-switch__off:before {
            -webkit-transform: rotate(45deg) scaleX(1) translateZ(0);
            transform: rotate(45deg) scaleX(1) translateZ(0);
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__off:before {
            -webkit-transform: rotate(45deg) scaleX(0) translateZ(0);
            transform: rotate(45deg) scaleX(0) translateZ(0);
        }
        .colorful-switch__off:after {
            -webkit-transition-timing-function: cubic-bezier(0.67, -0.16, 0.47, 1.61);
            transition-timing-function: cubic-bezier(0.67, -0.16, 0.47, 1.61);
            -webkit-transform: rotate(-45deg) scaleX(1) translateZ(0);
            transform: rotate(-45deg) scaleX(1) translateZ(0);
        }
        .colorful-switch__checkbox:checked ~ .colorful-switch__label .colorful-switch__off:after {
            -webkit-transition-timing-function: ease;
            transition-timing-function: ease;
            -webkit-transform: rotate(-45deg) scaleX(0) translateZ(0);
            transform: rotate(-45deg) scaleX(0) translateZ(0);
        }

    </style>
@endsection

@section('content')
    {{--new slider--}}
    {{-- This slider is made by --}}
    {{--<div class="demo-cont__credits">--}}
        {{--<div class="demo-cont__credits-close"></div>--}}
        {{--<h2 class="demo-cont__credits-heading">Made by</h2>--}}
        {{--<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/142996/profile/profile-512_5.jpg" alt="" class="demo-cont__credits-img" />--}}
        {{--<h3 class="demo-cont__credits-name">Nikolay Talanov</h3>--}}
        {{--<a href="https://codepen.io/suez/" target="_blank" class="demo-cont__credits-link">My codepen</a>--}}
        {{--<a href="https://twitter.com/NikolayTalanov" target="_blank" class="demo-cont__credits-link">My twitter</a>--}}
        {{--<h2 class="demo-cont__credits-heading">Based on</h2>--}}
        {{--<a href="https://dribbble.com/shots/2375246-Fashion-Butique-slider-animation" target="_blank" class="demo-cont__credits-link">Concept by Kreativa Studio</a>--}}
        {{--<h4 class="demo-cont__credits-blend">Global Blend Mode</h4>--}}
        {{--<div class="colorful-switch">--}}
            {{--<input type="checkbox" class="colorful-switch__checkbox js-activate-global-blending" id="colorful-switch-cb" />--}}
            {{--<label class="colorful-switch__label" for="colorful-switch-cb">--}}
                {{--<span class="colorful-switch__bg"></span>--}}
                {{--<span class="colorful-switch__dot"></span>--}}
                {{--<span class="colorful-switch__on">--}}
          {{--<span class="colorful-switch__on__inner"></span>--}}
        {{--</span>--}}
                {{--<span class="colorful-switch__off"></span>--}}
            {{--</label>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="demo-cont">
        <!-- slider start -->
        <div class="fnc-slider example-slider">
            <div class="fnc-slider__slides">
                <!-- slide start -->
                <div class="fnc-slide m--blend-green m--active-slide">
                    <div class="fnc-slide__inner">
                        <div class="fnc-slide__mask">
                            <div class="fnc-slide__mask-inner"></div>
                        </div>
                        <div class="fnc-slide__content">
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>Burnham</span>
                                </div>
                                <div class="fnc-slide__heading-line">
                                    <span>Park</span>
                                </div>
                            </h2>

                            {{--<button type="button" class="fnc-slide__action-btn">--}}
                                {{--Credits--}}
                                {{--<span data-text="Credits">Credits</span>--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </div>
                <!-- slide end -->
                <!-- slide start -->
                <div class="fnc-slide m--blend-dark">
                    <div class="fnc-slide__inner">
                        <div class="fnc-slide__mask">
                            <div class="fnc-slide__mask-inner"></div>
                        </div>
                        <div class="fnc-slide__content">
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>Burnham</span>
                                </div>
                                <div class="fnc-slide__heading-line">
                                    <span>Lake</span>
                                </div>
                            </h2>
                            {{--<button type="button" class="fnc-slide__action-btn">--}}
                                {{--Credits--}}
                                {{--<span data-text="Credits">Credits</span>--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </div>
                <!-- slide end -->
                <!-- slide start -->
                <div class="fnc-slide m--blend-red">
                    <div class="fnc-slide__inner">
                        <div class="fnc-slide__mask">
                            <div class="fnc-slide__mask-inner"></div>
                        </div>
                        <div class="fnc-slide__content">
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>Lion's</span>
                                </div>
                                <div class="fnc-slide__heading-line">
                                    <span>Head</span>
                                </div>
                            </h2>
                            {{--<button type="button" class="fnc-slide__action-btn">--}}
                                {{--Credits--}}
                                {{--<span data-text="Credits">Credits</span>--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </div>
                <!-- slide end -->
                <!-- slide start -->
                <div class="fnc-slide m--blend-blue">
                    <div class="fnc-slide__inner">
                        <div class="fnc-slide__mask">
                            <div class="fnc-slide__mask-inner"></div>
                        </div>
                        <div class="fnc-slide__content">
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>Cathedral</span>
                                </div>
                            </h2>
                            {{--<button type="button" class="fnc-slide__action-btn">--}}
                                {{--Credits--}}
                                {{--<span data-text="Credits">Credits</span>--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </div>
                <!-- slide end -->
            </div>
            <nav class="fnc-nav">
                <div class="fnc-nav__bgs">
                    <div class="fnc-nav__bg m--navbg-blue m--active-nav-bg"></div>
                    <div class="fnc-nav__bg m--navbg-blue"></div>
                    <div class="fnc-nav__bg m--navbg-blue"></div>
                    <div class="fnc-nav__bg m--navbg-blue"></div>
                </div>
                <div class="fnc-nav__controls">
                    <button class="fnc-nav__control">
                        Burnham Park
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                    <button class="fnc-nav__control">
                        Burnham Lake
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                    <button class="fnc-nav__control">
                        Lion's Head
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                    <button class="fnc-nav__control">
                        Cathedral
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                </div>
            </nav>
        </div>
        <!-- slider end -->
        {{--<div class="demo-cont__credits">--}}
            {{--<div class="demo-cont__credits-close"></div>--}}
            {{--<h2 class="demo-cont__credits-heading">Made by</h2>--}}
            {{--<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/142996/profile/profile-512_5.jpg" alt="" class="demo-cont__credits-img" />--}}
            {{--<h3 class="demo-cont__credits-name">Nikolay Talanov</h3>--}}
            {{--<a href="https://codepen.io/suez/" target="_blank" class="demo-cont__credits-link">My codepen</a>--}}
            {{--<a href="https://twitter.com/NikolayTalanov" target="_blank" class="demo-cont__credits-link">My twitter</a>--}}
            {{--<h2 class="demo-cont__credits-heading">Based on</h2>--}}
            {{--<a href="https://dribbble.com/shots/2375246-Fashion-Butique-slider-animation" target="_blank" class="demo-cont__credits-link">Concept by Kreativa Studio</a>--}}
            {{--<h4 class="demo-cont__credits-blend">Global Blend Mode</h4>--}}
            {{--<div class="colorful-switch">--}}
                {{--<input type="checkbox" class="colorful-switch__checkbox js-activate-global-blending" id="colorful-switch-cb" />--}}
                {{--<label class="colorful-switch__label" for="colorful-switch-cb">--}}
                    {{--<span class="colorful-switch__bg"></span>--}}
                    {{--<span class="colorful-switch__dot"></span>--}}
                    {{--<span class="colorful-switch__on">--}}
          {{--<span class="colorful-switch__on__inner"></span>--}}
        {{--</span>--}}
                    {{--<span class="colorful-switch__off"></span>--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    {{--end new slider--}}


    {{--slider--}}
    {{--<div id="slider" class="flexslider">--}}
        {{--<ul class="slides">--}}
            {{--<li>--}}
                {{--<img src="/images/slider/slider4.jpg">--}}
                {{--<div class="caption">--}}
                    {{--<h2><span>NEW! Ordinance for Urban Gardening</span></h2>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                    {{--<button class="btn">Read More</button>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<img src="/images/slider/slider5.jpg">--}}
                {{--<div class="caption">--}}
                    {{--<h2><span>No Smoking Ordinance</span></h2>--}}
                    {{--<h1><span>PUBLISHED</span></h1>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                    {{--<button class="btn">Read More</button>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<img src="/images/slider/slider6.jpg">--}}
                {{--<div class="caption">--}}
                    {{--<h2><span>No Jaywalking Ordinance.</span></h2>--}}
                    {{--<h1><span>Jaywalking is now prohibited!</span></h1>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
                    {{--<button class="btn">Read More</button>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}

    <div id="ordinance">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="ordinance-heading">
                        <h2>Ordinances</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <!--about wrapper left-->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <div class="ordinance-left">
                        <img src="https://c1.staticflickr.com/8/7347/27219912311_12ebb667a2_b.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        @foreach($ordinances as $ordinance)
                            <div class="ordinance-right-wrapper">
                                <a href="/public/showOrdinance/{{$ordinance->id}}">
                                    <p>{{ str_limit($ordinance->title, $limit = 100, $end = '...') }}</p>
                                </a>
                            </div>
                            <br/>
                        @endforeach

                        <div class="ordinance-right-wrapper"></div>

                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/ordinances'" class="btn btn-info button-two"><span>View All</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ordinance">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="ordinance-heading">
                        <h2>Resolutions</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <!--about wrapper left-->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <div class="ordinance-left">
                        <img src="https://c1.staticflickr.com/8/7347/27219912311_12ebb667a2_b.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        @foreach($resolutions as $resolution)
                            <div class="ordinance-right-wrapper">
                                <a href="/public/showResolution/{{$resolution->id}}">
                                    <p>{{ str_limit($resolution->title, $limit = 100, $end = '...') }}</p>
                                </a>
                            </div>
                            <br/>
                        @endforeach
                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/resolutions'" class="btn btn-info button-two"><span>View All</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('scripts')
    <script>
        (function() {

            var $$ = function(selector, context) {
                var context = context || document;
                var elements = context.querySelectorAll(selector);
                return [].slice.call(elements);
            };

            function _fncSliderInit($slider, options) {
                var prefix = ".fnc-";

                var $slider = $slider;
                var $slidesCont = $slider.querySelector(prefix + "slider__slides");
                var $slides = $$(prefix + "slide", $slider);
                var $controls = $$(prefix + "nav__control", $slider);
                var $controlsBgs = $$(prefix + "nav__bg", $slider);
                var $progressAS = $$(prefix + "nav__control-progress", $slider);

                var numOfSlides = $slides.length;
                var curSlide = 1;
                var sliding = false;
                var slidingAT = +parseFloat(getComputedStyle($slidesCont)["transition-duration"]) * 1000;
                var slidingDelay = +parseFloat(getComputedStyle($slidesCont)["transition-delay"]) * 1000;

                var autoSlidingActive = false;
                var autoSlidingTO;
                var autoSlidingDelay = 5000; // default autosliding delay value
                var autoSlidingBlocked = false;

                var $activeSlide;
                var $activeControlsBg;
                var $prevControl;

                function setIDs() {
                    $slides.forEach(function($slide, index) {
                        $slide.classList.add("fnc-slide-" + (index + 1));
                    });

                    $controls.forEach(function($control, index) {
                        $control.setAttribute("data-slide", index + 1);
                        $control.classList.add("fnc-nav__control-" + (index + 1));
                    });

                    $controlsBgs.forEach(function($bg, index) {
                        $bg.classList.add("fnc-nav__bg-" + (index + 1));
                    });
                };

                setIDs();

                function afterSlidingHandler() {
                    $slider.querySelector(".m--previous-slide").classList.remove("m--active-slide", "m--previous-slide");
                    $slider.querySelector(".m--previous-nav-bg").classList.remove("m--active-nav-bg", "m--previous-nav-bg");

                    $activeSlide.classList.remove("m--before-sliding");
                    $activeControlsBg.classList.remove("m--nav-bg-before");
                    $prevControl.classList.remove("m--prev-control");
                    $prevControl.classList.add("m--reset-progress");
                    var triggerLayout = $prevControl.offsetTop;
                    $prevControl.classList.remove("m--reset-progress");

                    sliding = false;
                    var layoutTrigger = $slider.offsetTop;

                    if (autoSlidingActive && !autoSlidingBlocked) {
                        setAutoslidingTO();
                    }
                };

                function performSliding(slideID) {
                    if (sliding) return;
                    sliding = true;
                    window.clearTimeout(autoSlidingTO);
                    curSlide = slideID;

                    $prevControl = $slider.querySelector(".m--active-control");
                    $prevControl.classList.remove("m--active-control");
                    $prevControl.classList.add("m--prev-control");
                    $slider.querySelector(prefix + "nav__control-" + slideID).classList.add("m--active-control");

                    $activeSlide = $slider.querySelector(prefix + "slide-" + slideID);
                    $activeControlsBg = $slider.querySelector(prefix + "nav__bg-" + slideID);

                    $slider.querySelector(".m--active-slide").classList.add("m--previous-slide");
                    $slider.querySelector(".m--active-nav-bg").classList.add("m--previous-nav-bg");

                    $activeSlide.classList.add("m--before-sliding");
                    $activeControlsBg.classList.add("m--nav-bg-before");

                    var layoutTrigger = $activeSlide.offsetTop;

                    $activeSlide.classList.add("m--active-slide");
                    $activeControlsBg.classList.add("m--active-nav-bg");

                    setTimeout(afterSlidingHandler, slidingAT + slidingDelay);
                };



                function controlClickHandler() {
                    if (sliding) return;
                    if (this.classList.contains("m--active-control")) return;
                    if (options.blockASafterClick) {
                        autoSlidingBlocked = true;
                        $slider.classList.add("m--autosliding-blocked");
                    }

                    var slideID = +this.getAttribute("data-slide");

                    performSliding(slideID);
                };

                $controls.forEach(function($control) {
                    $control.addEventListener("click", controlClickHandler);
                });

                function setAutoslidingTO() {
                    window.clearTimeout(autoSlidingTO);
                    var delay = +options.autoSlidingDelay || autoSlidingDelay;
                    curSlide++;
                    if (curSlide > numOfSlides) curSlide = 1;

                    autoSlidingTO = setTimeout(function() {
                        performSliding(curSlide);
                    }, delay);
                };

                if (options.autoSliding || +options.autoSlidingDelay > 0) {
                    if (options.autoSliding === false) return;

                    autoSlidingActive = true;
                    setAutoslidingTO();

                    $slider.classList.add("m--with-autosliding");
                    var triggerLayout = $slider.offsetTop;

                    var delay = +options.autoSlidingDelay || autoSlidingDelay;
                    delay += slidingDelay + slidingAT;

                    $progressAS.forEach(function($progress) {
                        $progress.style.transition = "transform " + (delay / 1000) + "s";
                    });
                }

                $slider.querySelector(".fnc-nav__control:first-child").classList.add("m--active-control");

            };

            var fncSlider = function(sliderSelector, options) {
                var $sliders = $$(sliderSelector);

                $sliders.forEach(function($slider) {
                    _fncSliderInit($slider, options);
                });
            };

            window.fncSlider = fncSlider;
        }());

        /* not part of the slider scripts */

        /* Slider initialization
         options:
         autoSliding - boolean
         autoSlidingDelay - delay in ms. If audoSliding is on and no value provided, default value is 5000
         blockASafterClick - boolean. If user clicked any sliding control, autosliding won't start again
         */
        fncSlider(".example-slider", {autoSlidingDelay: 4000});

        var $demoCont = document.querySelector(".demo-cont");

        [].slice.call(document.querySelectorAll(".fnc-slide__action-btn")).forEach(function($btn) {
            $btn.addEventListener("click", function() {
                $demoCont.classList.toggle("credits-active");
            });
        });

        document.querySelector(".demo-cont__credits-close").addEventListener("click", function() {
            $demoCont.classList.remove("credits-active");
        });

        document.querySelector(".js-activate-global-blending").addEventListener("click", function() {
            document.querySelector(".example-slider").classList.toggle("m--global-blending-active");
        });
    </script>
@endsection
