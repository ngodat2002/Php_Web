
@extends('front.layout.master')
@section('title','Home')
@section('body')
    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="front/img/carousel1.png" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1>Best <span>Quality</span> Ingredients</h1>
                        <p>
                            Welcome people to our restaurant website. Cloud Kitchen is pleased to serve delicious food for your meal.
                        </p>
                        <div class="carousel-btn">
                            <a class="btn custom-btn" href="menu">View Menu</a>
                            <a class="btn custom-btn" href="">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="front/img/carousel-2.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1>World’s <span>Best</span> Chef</h1>
                        <p>
                            Welcome people to our restaurant website. Cloud Kitchen is pleased to serve delicious food for your meal.
                        </p>
                        <div class="carousel-btn">
                            <a class="btn custom-btn" href="menu">View Menu</a>
                            <a class="btn custom-btn" href="">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="front/img/carousel-3.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1>Fastest Order <span>Delivery</span></h1>
                        <p>
                            Welcome people to our restaurant website. Cloud Kitchen is pleased to serve delicious food for your meal.
                        </p>
                        <div class="carousel-btn">
                            <a class="btn custom-btn" href="menu">View Menu</a>
                            <a class="btn custom-btn" href="">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Menu Start -->
    <div class="menu">
        <div class="container">
            <div class="section-header text-center">
                <p>Food Menu</p>
                <h2>Delicious Food Menu</h2>

            </div>
            <div class="menu-tab">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <form action="">
                            <div class="food-filter">
                                <h3 class="ff-title">Categories</h3>
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="menu/{{$category->name}}" class="ct-link">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="food-filter">
                                <h3 class="ff-title">Meal</h3>
                                <div class="ff-meal-check">
                                    @foreach($meals as $meal)
                                        <div class="ab-item">
                                            <label for="ab-{{$meal->id}}">
                                                <input type="checkbox"
                                                       {{(request("meal")[$meal->id]??'')=='on' ? 'checked' : ''}}
                                                       name="meal[{{$meal->id}}]"
                                                       onchange="this.form.submit();"
                                                       id="ab-{{$meal->id}}">
                                                {{$meal->name}}
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="food-filter">
                                <h3 class="ff-title">Tags</h3>
                                <div class="ff-tags">
                                    <a href="#">Dinner</a>
                                    <a href="#">Lunch</a>
                                    <a href="#">Breakfast</a>
                                    <a href="#">Snacks</a>
                                    <a href="#">Chinese</a>
                                    <a href="#">Vietnamese</a>
                                    <a href="#">Mexico</a>
                                    <a href="#">Sen Restaurant</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <div class="menu-food">
                            <h4>Menu FoodMate</h4>
                        </div>
                        <div class="menu-list">
                            <div class="row">
                                @foreach($products as $product)
                                    @include('front.components.product-item')
                                @endforeach
                            </div>
                        </div>
                        {{$products ->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->


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
                            <a class="btn custom-btn" href="menu">Order now</a>
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
                        <a class="btn custom-btn" href="menu">Order now</a>
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
                                <h3>Fresh vegetables & Meat</h3>
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


    <!-- Food Start -->
    <div class="food">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-burger"></i>
                        <h2>Burgers</h2>
                        <p>
                            Hamburger is a famous and popular cake type around the world.
                        </p>
                        <a href="menu.html">View Menu</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-snack"></i>
                        <h2>Snacks</h2>
                        <p>
                            Fine food, convenient but still meets enough calories for the body.
                        </p>
                        <a href="menu.html">View Menu</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="fas fa-drumstick-bite"></i>
                        <h2>Chickens</h2>
                        <p>
                            There are many delicious and attractive dishes made from chickens.
                        </p>
                        <a href="menu.html">View Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Food End -->


    <!-- Team Start -->
    <div class="team">
        <div class="container">
            <div class="section-header text-center">
                <p>Our Team</p>
                <h2>Our Master Chef</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="front/img/idolhiep.jpg" alt="Image" class="img-team">
                            <div class="team-social">
                                <a href="https://www.facebook.com/hiep.nguyenminh.9887" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/hiep.nguyenminh.9887" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.facebook.com/hiep.nguyenminh.9887" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.facebook.com/hiep.nguyenminh.9887" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Nguyễn Minh Hiệp</h2>
                            <p>CEO, Co Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="front/img/idolhoang.jpg" alt="Image" class="img-team">
                            <div class="team-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Đinh Việt Hoàng</h2>
                            <p>Master Chef</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="front/img/idollap.jpg" alt="Image" class="img-team">
                            <div class="team-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Nguyễn Văn Lập</h2>
                            <p>Master Chef</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="front/img/idolvietanh.jpg" alt="Image" class="img-team">
                            <div class="team-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Vũ Việt Anh</h2>
                            <p>Master Chef</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="testimonial">
        <div class="container">
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="front/img/dat.jpg" alt="Image">
                    </div>
                    <p>
                        I am a student from Fpt Aptech class T2010A
                    </p>
                    <h2>Ngô Chí Thành Đạt</h2>
                    <h3>Student</h3>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="front/img/dat.jpg" alt="Image">
                    </div>
                    <p>
                        I am a CEO of FoodMate Group and an alumnus of Fpt
                    </p>
                    <h2>Ngô Chí Thành Đạt</h2>
                    <h3>CEO</h3>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="front/img/dat2.jpg" alt="Image">
                    </div>
                    <p>
                        I am a CO-Founder of FoodMate Group and an alumnus of Fpt
                    </p>
                    <h2>Chử Đức Long</h2>
                    <h3>CO-Founder</h3>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="front/img/minh3.png" alt="Image">
                    </div>
                    <p>
                        I am a Saler of FoodMate Group and an alumnus of Fpt
                    </p>
                    <h2>Nguyễn Đức Minh</h2>
                    <h3>SALE</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center">
                <p>Contact Us</p>
                <h2>Contact For Any Query</h2>
            </div>
            <div class="row align-items-center contact-information">
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Address</h3>
                            <p>My Dinh, Ha Noi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call Us</h3>
                            <p>+84 394480757</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email Us</h3>
                            <p>dat3578@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-share"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Follow Us</h3>
                            <div class="contact-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row contact-form">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1600663868074!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->





@endsection
