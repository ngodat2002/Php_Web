@extends('front.layout.master')
@section('title','About')
@section('body')
    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>About Us</h2>
                </div>
                <div class="col-12">
                    <a href="./">Home</a>
                    <a href="about">About Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->



    <!-- About Start -->
    <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="front/img/about.jpg" alt="Image">
                        <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-header">
                            <p>About Us</p>
                            <h2>Cooking Since 1990</h2>
                        </div>
                        <div class="about-text">
                            <p>
                                We were present in more than 118 countries with a series of 35,000 restaurants throughout the continents, every day Cloud Kitchen served over 70 million consumers, not only ensuring to bring them delicious meals, An The whole cleaning, but also made them happy with Cloud Kitchen service.
                            </p>
                            <p>
                                Cloud Kitchen will set up a new standard for the restaurant industry to serve fast food in Vietnam, giving customers the unique experience only at our restaurant chain.
                            </p>
                            <a class="btn custom-btn" href="menu">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Video Modal Start-->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Feature Start -->
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-header">
                        <p>Why Choose Us</p>
                        <h2>Our Key Features</h2>
                    </div>
                    <div class="feature-text">
                        <div class="feature-img">
                            <div class="row">
                                <div class="col-6">
                                    <img src="front/img/feature-1.jpg" alt="Image">
                                </div>
                                <div class="col-6">
                                    <img src="front/img/feature-2.jpg" alt="Image">
                                </div>
                                <div class="col-6">
                                    <img src="front/img/feature-3.jpg" alt="Image">
                                </div>
                                <div class="col-6">
                                    <img src="front/img/feature-4.jpg" alt="Image">
                                </div>
                            </div>
                        </div>
                        <p>
                            Cloud Kitchen has a lot of interesting menus to fully meet the aesthetic, nutrition, quality, hygiene and prices waiting for you to visit and order.
                        </p>
                        <a class="btn custom-btn" href="menu">Order Now</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-cooking"></i>
                                <h3>World’s best Chef</h3>
                                <p>
                                    We have the best professional chef and service team in the world.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-vegetable"></i>
                                <h3>Natural ingredients</h3>
                                <p>
                                    Food with a very beneficial ingredient of nature.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-medal"></i>
                                <h3>Best quality products</h3>
                                <p>
                                    Our products ensure food safety and hygiene.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-meat"></i>
                                <h3>Fresh vegetables & Meet</h3>
                                <p>
                                    Use quality vegetables and meat materials.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-courier"></i>
                                <h3>Fastest door delivery</h3>
                                <p>
                                    Committed to prompt delivery and at the same time we also have promotions of the day.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-fruits-and-vegetables"></i>
                                <h3>Ground beef & Low fat</h3>
                                <p>
                                    Beef ground little fat does not cause fat for the user's body.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
@endsection
