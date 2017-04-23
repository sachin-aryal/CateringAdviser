<?php include "_header.php"?>

<html>
<head>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">

    <style>
        body, html {
            height: 100%;
            background-image:url("images/mainbackground.jpg");;
        }


        .parallax {
            background-image: url("images/illu.jpg");

            height: 64%;
            padding-top:2%;
            padding-bottom:2%;
            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        footer{
            padding-top:5px;
            background-color:rgba(63, 3, 34, 0.8);
            color:white;
            position: relative;

        }
    </style>


</head>
<body>
<section class="maincarousel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" id="carousel-custom">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel-custom">
                        </li>
                        <li data-slide-to="1" data-target="#carousel-custom">
                        </li>
                        <li data-slide-to="2" data-target="#carousel-custom">
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img alt="Carousel Bootstrap First" src="images/carousel1.jpg" class="img-responsive"/>
                            <div class="carousel-caption animated fadeInUp"  style="margin-bottom: 10%">
                                <img alt="Bootstrap Image Preview" src="images/mainlogo.png" width="20%" class="img-responsive" style="display: block; margin-left: auto; margin-right: auto;"/>
                                <h2>
                                    Welcome
                                </h2>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="Carousel Bootstrap Second" src="images/carousel2.jpg" class="img-responsive"/>
                            <div class="carousel-caption animated fadeInUp" style="margin-bottom: 10%">
                                <img alt="Bootstrap Image Preview" src="images/mainlogo.png" width="20%" class="img-responsive" style="display: block; margin-left: auto; margin-right: auto;"/>
                                <h2>
                                    Are You Searching For A Catering ?
                                </h2>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="Carousel Bootstrap Third" src="images/carousel1.jpg" class="img-responsive"/>
                            <div class="carousel-caption animated fadeInUp" style="margin-bottom: 10%">
                                <img alt="Bootstrap Image Preview" src="images/mainlogo.png" width="20%" class="img-responsive" style="display: block; margin-left: auto; margin-right: auto;"/>
                                <h2>
                                    Do You Own A Catering ?
                                </h2>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                    </div> 	<a class="left carousel-control" href="#carousel-custom" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-custom" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id = "features" style="text-align:center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 animated fadeInUp">
                <h1>Features</h1>
                <div class="row animated fadeInUp">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />
                            <div class="caption">
                                <h3>
                                    Search
                                </h3>
                                <p>
                                    Search for the catering that you want
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="search.php">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                            <div class="caption">
                                <h3>
                                    Comparision
                                </h3>
                                <p>
                                    Commpare two of your choosen caterings
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="#">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
                            <div class="caption">
                                <h3>
                                    Membership
                                </h3>
                                <p>
                                    If you own a catering. Become a member
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="#">Action</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="parallax">
    <section class="aboutus">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron animated fadeIn" style="text-align: center;">
                        <h2>
                            The Catering Advisor
                        </h2>
                        <p style="text-align: justify;">
                            The Catering Advisor is your one-stop-digital-spot for all the catering needs. In this daily stressful life,
                            it's gets hard to travel not because we don't have the means but usually because of the busy lifestyle we like to follow.
                            It's great to stay busy. Traditionally when in need to someone to cater our events, we go travel to each service provider one-by-one.
                            This comsumes unnecessary time, energy and money. What if there was, a place where you could get all the information you need and save all of these three.
                            This was the vision behind "The catering Advisor". We are here simply to make your lives a'lil bit better
                        </p>
                        <p>
                            <a class="btn btn-primary btn-large" href="#">Go To Top</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="text-right">
                    <strong>&copy; Copyright </strong>Catering Advisor </br><em> Created by Prajwol Shrestha </em>
                </p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>