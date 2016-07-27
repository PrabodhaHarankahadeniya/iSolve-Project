@extends('Layouts.master')

@section('style')
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        .show {
            visibility: visible !important;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
    </style>
<style>

    body{
    background-color: greenyellow;
        font-family: sans-serif;

    }
    h1{
        text-align: center;
        font-family:SansSerif;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {box-sizing:border-box}
    body {font-family: Verdana,sans-serif;background-color: greenyellow;}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1500px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 13px;
        width: 13px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 3s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
    }
</style>

    @endsection



@section('content')
    <link rel="stylesheet" href="src/css/homePage.css">
<section class="row new-post">
    <h1>SHAKUNI PVT(Ltd) </h1>
<br>
</section>

    <div id="snackbar">Password was changed successfully..</div>
    @if($done!=null)
        <script>
        window.onload =function myFunction() {
        var x = document.getElementById("snackbar")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
                </script>
    @endif
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img height="450px" src="src/img/rice_paddies_villa.jpg" style="width:1150px">
        </div>

        <div class="mySlides fade">
            <img  height="450px"src="src/img/IMG_5248.jpg" style="width:1150px">
        </div>
        <div class="mySlides fade">
            <img  height="450px"src="src/img/IMG_5142.jpg" style="width:1150px">
        </div>
        <div class="mySlides fade">
            <img  height="450px"src="src/img/IMG_5230.jpg" style="width:1150px">
        </div>
        <div class="mySlides fade">
            <img  height="450px"src="src/img/IMG_5202.jpg" style="width:1150px">
        </div>
        <div class="mySlides fade">
            <img  height="450px" src="src/img/banner-3neww.jpg" style="width:1150px">
        </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex> slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 3000); // Change image every 2 seconds
        }
    </script>
@endsection