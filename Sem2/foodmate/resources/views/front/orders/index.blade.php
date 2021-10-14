<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{asset('/')}}">
    <meta charset="utf-8">
    <title>Your cart | FoodMate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="front/img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="front/lib/animate/animate.min.css" rel="stylesheet">
    <link href="front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="front/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="front/css/style.css" rel="stylesheet">
    <link href="front/css/login.css" rel="stylesheet">


</head>

<body>

<!-- Nav Bar Start -->
<div class="navbar navbar-expand-lg bg-light navbar-light" >
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12">
                <div class="nav-left">
                    <div class="mail">
                        <i class="far fa-envelope"></i> dat3578@gmail.com
                    </div>
                    <i class="fas fa-grip-lines-vertical icon-nav"></i>
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i> +84 0394480757
                    </div>
                </div>
                <div class="nav-right-2">
                    <div class="nav-login">
                        @if(Route::has('login'))
                            @auth
                                <x-app-layout>
                                    <a href="{{url('/dashboard')}}"></a>
                                </x-app-layout>
                            @else
                                <a href="{{route('login')}}" class="login-panel">
                                    <i class="far fa-user"></i> <span>Login</span>
                                </a>
                                @if(Route::has('register'))
                                    <a href="{{route('register')}}"><span>Register</span></a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
                <div class="nav-right-1">
                    <div class="container">
                        <div class="row">

                            <div class="col">
                                <div class="top-cart">
                                    <ul class="nav-icon">
                                        <li class="cart-icon">
                                            <a href="./cart">
                                                <i class="fas fa-shopping-bag"></i>
                                                <span>{{Cart::count()}}</span>
                                            </a>
                                        </li>
                                        <li class="cart-price">${{Cart::total()}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="search-widget-1">
                                    <form action="./" method="get">

                                        <label>
                                            <input name="search" value="{{request('search')}}"  class="form-control" type="text" placeholder="Search Keyword" required="required">
                                        </label>
                                        <button class="btn btn-sear" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <div class="container-fluid">
                    <a href="/" class="navbar-brand">Food <span>Mate</span></a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav ml-auto">
                            <a href="./" class="nav-item nav-link {{(request()->segment(1) == '')? 'active' :''}}">Home</a>
                            <a href="./about" class="nav-item nav-link {{(request()->segment(1) == 'about')? 'active' :''}}">About</a>
                            <a href="./restaurant" class="nav-item nav-link {{(request()->segment(1) == 'restaurant')? 'active' :''}}">Restaurants</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu">
                                    <a href="./cart" class="dropdown-item">Shopping Cart</a>
                                    <a href="./checkout" class="dropdown-item">Check Out</a>
                                    <a href="}" class="dropdown-item">Register</a>
                                    <a href="" class="dropdown-item">Login</a>
                                </div>
                            </div>
                            <a href="./contact" class="nav-item nav-link {{(request()->segment(1) == 'contact')? 'active' :''}}">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Nav Bar End -->

<div class="menu">

    <div class="container" style="margin-top: 200px">
        <div class="section-header text-center">
            <h2>My Cart</h2>
        </div>
        <form action="{{url('my-order')}}" method="post" style="margin-left: 20px;">
        @csrf
        <div class="form-group row">
            <label for="date" class="col-form-label">From</label>
            <div class="col-sm-3">
                <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required>
            </div>
            <label for="date" class="col-form-label ">To</label>
            <div class="col-sm-3">
                <input type="date" class="form-control input-sm" id="toDate" name="toDate" required>
            </div>
            <div class="col-sm-2">
                <button class="btn"  type="submit" name="search" title="Search"><i class="fas fa-search"></i></button>
            </div>
        </div>
        </form>
         <table class="table">
            <thead class="table-dark">
            <tr style="text-align: center">
                <th>#</th>
                <th>Tracking Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                    <tr style="text-align: center">
                        <td>{{$order->id}}</td>
                        <td>{{$order->tracking_no}}</td>
                        <td>{{$order->first_name}}</td>
                        <td>{{$order->last_name}}</td>
                        @if($order->status=='0')
                            <td>Pending</td>
                        @elseif($order->status=='1')
                            <td>Delivered</td>
                        @elseif($order->status=='2')
                            <td>Cancel</td>
                        @endif
                        <td>{{date('d-m-Y',strtotime($order->created_at))}}</td>
                        @if($order->status=='0')
                                <td>
                                    <a href="{{url('view-order/'.$order->id)}}" class="btn btn-warning" >View Order</a>
                                    <a href="{{url('delete-order/'.$order->id)}}" class="btn btn-warning" >Cancel Order</a>
                                </td>
                        @elseif($order->status=='2')
                                <td>
                                    <a href="{{url('view-order/'.$order->id)}}" class="btn btn-warning" >View Order</a>
                                </td>
                            @else
                            <td>
                                <a href="{{url('view-order/'.$order->id)}}" class="btn btn-warning" >View Order</a>
                            </td>
                        @endif
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-contact">
                            <h2>Our Address</h2>
                            <p><i class="fa fa-map-marker-alt"></i>Số 8 Tôn Thất Thuyết Mỹ Đình Nam Từ Liêm Hà Nội</p>
                            <p><i class="fa fa-phone-alt"></i>+84 0394480757</p>
                            <p><i class="fa fa-envelope"></i>dat3578@gmail.com</p>
                            <div class="footer-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-link">
                            <h2>Quick Links</h2>
                            <a href="">Terms of use</a>
                            <a href="">Privacy policy</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="footer-newsletter">
                    <h2>Newsletter</h2>
                    <p>
                        Lorem ipsum dolor sit amet elit. Quisque eu lectus a leo dictum nec non quam. Tortor eu placerat rhoncus, lorem quam iaculis felis, sed lacus neque id eros.
                    </p>
                    <div class="form">
                        <form action="#">
                            <input class="form-control" placeholder="Email goes here" required="required">
                            <button class="btn custom-btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <p>Copyright &copy; <a href="#">NgoChiThanhDat</a>, All Right Reserved.</p>
            <p>Designed By <a href="#">HTML Codex & Space Error </a></p>
        </div>
    </div>
</div>
<!-- Footer End -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="front/lib/easing/easing.min.js"></script>
<script src="front/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="front/lib/tempusdominus/js/moment.min.js"></script>
<script src="front/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<script src="front/mail/jqBootstrapValidation.min.js"></script>
<script src="front/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="front/js/main.js"></script>
<script type="text/javascript">
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
//Update cart
        const rowId =  $button.parent().find('input').data('rowid');
        updateCart(rowId,newVal)
    });

    function  updateCart(rowId,qty){
        $.ajax({
            type: "GET",
            url:"cart/update",
            data:{rowId: rowId,qty: qty},
            success:function (response){
                // alert('Update successful!');
                console.log(response);
                location.reload();
            },
            error:function (error){
                alert('Update failed.');
                console.log(error);
            },
        });
    }
</script>
</body>
</html>
