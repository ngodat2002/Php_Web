

@extends('front.layout.master')
@section('title','Login')
@section('body')

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Login</h2>
                </div>
                <div class="col-12">
                    <a href="index.html">Home</a>
                    <a href="login.html">Login</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!--Login Start-->
    <div class="login-register">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login-start">
                        <div class="login-background" >

                        </div>
                        <div class="login-tx_btn">
                            <h3>Welcome back to <span class="fd-cl">Food</span><span class="fo-cl">Mate</span></h3>
                            <p>Please login now to be able to order delicious and beautiful dishes with me</p>
                            <a href="{{route('register')}}" class="btn-login">Create an account?</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-login">
                            <h3 class="center">LOGIN</h3>
                            <div class="control-login">
                                <label for="email">Username or Email:</label><br>
                                <input type="text" class="input-login" name="email" id="email" value="{{ old('email') }}" required><br>
{{--                                <span class="text-danger">@error('email') {{$message}} @enderror</span>--}}
                            </div>
                            <div class="control-login">
                                <label for="pass">Password:</label><br>
                                <br>
                                <input type="password" class="input-login" id="pass" name="password" required><br>
                                <span class="text-danger">
{{--                                @error('password'){{$message}}@enderror--}}
                            </span>
                            </div>
                            <div class="control-login">
                                <input type="checkbox" id="box" class="input-box">
                                <label for="box">Save password</label>
                                <span class="input-box span-login"><a href="#">Forget for password</a></span>

                            </div>
                            <br>
                            <div class="control-login">
                                <button type="submit" value="submit" class="center btn-sign">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Login End-->
@endsection

