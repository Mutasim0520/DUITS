@extends('layouts.user')
@section('title')
DUITS
@endsection
@section('content')
    <section id="hero">
        <div id="owl-main" class="owl-carousel height-md owl-inner-nav owl-ui-lg">
            <div class="item" style="background-image: url(assets/images/art/slider01.jpg);">
                <div class="container">
                    <div class="caption vertical-center text-center">
                        <h1 class="fadeInDown-1 light-color">Made for Designers</h1>
                        <p class="fadeInDown-2 medium-color">Create your online portfolio in minutes with the professionally and lovingly designed
                            REEN website template. Customize your site with versatile and easy to use
                            features.
                        </p>
                        <div class="fadeInDown-3">
                            <a href="#" class="btn btn-large">Get started now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(assets/images/art/slider02.jpg);">
                <div class="container">
                    <div class="caption vertical-center text-right">
                        <h1 class="fadeInLeft-1 light-color">Fresh and
                            <br>beautiful design</h1>
                        <p class="fadeInLeft-2 light-color">REEN is designed to showcase your talent and put your work in the forefront.
                            <br>Professionally use of typography and layout that fits your content.</p>
                        <div class="fadeInLeft-3">
                            <a href="#" class="btn btn-large">Get started now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(assets/images/art/slider03.jpg);">
                <div class="container">
                    <div class="caption vertical-center text-left">
                        <h1 class="fadeInRight-1 dark-bg light-color">
                                                <span>Clean and
                                                      <br>reusable code</span>
                        </h1>
                        <p class="fadeInRight-2 dark-color">The clean code allows you to easily copy code blocks from content
                            <br>modules and past them in different places or layouts.</p>
                        <div class="fadeInRight-3">
                            <a href="#" class="btn btn-large">Get started now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(assets/images/art/slider04.jpg);">
                <div class="container">
                    <div class="caption vertical-top text-right">
                        <h1 class="fadeIn-1 dark-bg light-color">
                                                <span>Just focus on
                                                      <br>your creativity</span>
                        </h1>
                        <p class="fadeIn-2 light-color">Take a break from messing around with heavy coding and spend
                            <br>your time brainstorming ideas for your next project.</p>
                        <div class="fadeIn-3">
                            <a href="#" class="btn btn-large">Get started now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(assets/images/art/slider05.jpg);">
                <div class="container">
                    <div class="caption vertical-top text-center">
                        <h1 class="fadeInDown-1 light-color">Showcase
                            <br>your content</h1>
                        <p class="fadeInDown-2 medium-color">With REEN you have the possibility to create websites for various
                            <br>contents quickly and easily. Now it's up to you!</p>
                        <div class="fadeInDown-3">
                            <a href="#" class="btn btn-large">Get started now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="product">
        <div class="container inner">
            <div class="row">
                <div class="col-sm-6 inner-right-xs text-right">
                    <figure>
                        <img src="/images/why.jpg" alt="">
                    </figure>
                </div>
                <div class="col-sm-6 inner-top-xs inner-left-xs">
                    <h2>Why DUITS</h2>
                    <p style="text-align: justify;">After getting admitted into a university, a student should take part in activities for
                        welfare of the country and betterment of the nation rather than being confined
                        into academical studies. That is why one should join different clubs, associations
                        or organizations which help to gain variety of skills and to get involved in different
                        social activities. The organizations or associations give us opportunity to do
                        social work and by such activities our hearts fill with patriotism and love for
                        the nation.</p>
                    <a href="{{Route('user.why.us')}}" class="txt-btn">Learn More</a>
                </div>
            </div>
            <div class="row inner-top-md">
                <div class="col-sm-6 col-sm-push-6 inner-left-xs">
                    <figure>
                        <img src="/images/history.jpg" alt="">
                    </figure>
                </div>
                <div class="col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
                    <h2>History & Introduction</h2>
                    <p style="text-align: justify;">University of Dhaka hereby established an "Information Technology (IT) Society" to create
                        a friendly and constructive generation based on technology. The name of the society
                        is Dhaka University IT Society (DUITS), headed by Abdullah Al Imran, President;
                        Arif Dewan, General Secretary. The Vice-Chancellor of Dhaka University is the chief
                        patron and Dr. AJM Shafiul Alam Bhuiyan, Professor, ...........................
                    </p>
                    <a href="{{Route('user.history')}}" class="txt-btn">Visit to Learn More</a>
                </div>
            </div>

        </div>
    </section>
    <section id="visit-our-store" class="img-bg img-bg-soft tint-bg" style="background-image: url(assets/images/1.jpg);">
        <div class="container inner">
            <div class="row">
                <div class="col-md-8 col-sm-9">
                    <header>
                        <h1>Our Activities</h1>
                        <li>Samsung Inter Hall Quiz Contest</li>
                        <li>Campus IT Fest</li>
                        <li>2nd DUITS - Robi National IT Fest</li>
                        <li>One Student One Laptop Giving Ceremony</li>
                        <li>3rd DUITS - Ericsson National IT Fest</li>
                        <li>Roundtable Discussion on Campus Wi-fi, Limitations & Possibilities</li>
                    </header>
                    <a href="activities.html" class="btn btn-large">View All Activities</a>
                </div>
            </div>
        </div>
    </section>
    <section id="who-we-are">
        <div class="container inner-md" style="padding-bottom: 0px; padding-top: 0px;">
            <div class="row inner-top-xs">
                <div class="col-sm-12 inner-right-xs inner-bottom-xs">

                    <div class="col-md-6 col-sm-6 inner-top inner-right-sm">
                        <h3 class="sidelines text-center">
                            <span>Our Achivments</span>
                        </h3>
                        <ul class="arrowed">
                            <li>One Student One Laptop</li>
                            <li>National ICT Day</li>
                            <li>Smart ID Card for Student</li>
                            <li>More than 400 meters area ofTSC has been facilitated with full speed Wi-Fi
                                with the help of Ministry of ICT & DU</li>
                            <li>Increase of University's central internet bandwith</li>
                            <li>Wi-Fi facilities have been strengthened around the campus after our roundtable
                                discussion and survey report</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6 inner-top inner-right-sm">
                        <h3 class="sidelines text-center">
                            <span>Future scope</span>
                        </h3>
                        <ul class="arrowed">
                            <li>Expansion of One Student One Laptop program</li>
                            <li>SAARC Campus IT Fest</li>
                            <li>Campus Radio</li>
                            <li>Digital Lab for General Students</li>
                            <li>Idea Contest: Imagine Your Campus Through ICT</li>
                            <li>Campus Administrative Automation </li>
                            <li>Basic computing for the 1st year students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection