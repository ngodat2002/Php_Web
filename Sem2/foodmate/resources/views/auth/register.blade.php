
@extends('front.layout.master')
@section('title','Register')
@section('body')
    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Register</h2>
                </div>
                <div class="col-12">
                    <a href="index.html">Home</a>
                    <a href="login.html">Login</a>
                    <a href="register.html">Register</a>
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
                    <form method="POST" action="{{ route('register') }}">

                        @csrf
                        <div class="form-register">
                            <h3 class="center">REGISTER</h3>
                            <div class="control-login">
                                <label for="name" value="{{ __('Name') }}">Username :</label>
                                <input type="text" id="name" class="input-login" name="name" :value="old('name')" required autofocus autocomplete="name"><br>
{{--                                <span class="text-danger">@error('name') {{$message}} @enderror</span>--}}
                            </div>
                            <div class="control-login">
                                <label  for="email" value="{{ __('Email') }}">Email :</label><br>
                                <input type="text" class="input-login" id="email" name="email" :value="old('email')" required ><br>
{{--                                <span class="text-danger">@error('email'){{$message}} @enderror</span>--}}
                            </div>
                            <div class="control-login">
                                <label for="phone" value="{{__('Phone')}}">Phone :</label><br>
                                <input type="text" class="input-login" name="phone" id="phone" :value="old('phone')" required><br>
{{--                                <span class="text-danger">@error('phone'){{$message}} @enderror</span>--}}
                            </div>
                            <div class="control-login">
                                <label for="password" value="{{ __('Password') }}">Password :</label>
                                <input type="password" class="input-login" name="password" required autocomplete="new-password" ><br>
{{--                                <span class="text-danger">@error('password'){{$message}} @enderror</span>--}}
                            </div>
                            <div class="control-login">
                                <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm password :</label>
                                <input type="password" class="input-login" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"><br>
{{--                                <span class="text-danger">@error('confirm-password'){{$message}} @enderror</span>--}}
                            </div>
                            <br>
                            <div class="control-login">
                                <button type="submit" value="submit" class="center btn-sign">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="login-start">
                        <div class="login-background"></div>
                        <div class="login-tx_btn">
                            <h3>Welcome back to <span class="fd-cl">Food</span><span class="fo-cl">Mate</span></h3>
                            <p>Please register an account to be a member of the site and have the best experience or if you
                                already have an account you can click BACK Login.</p>
                            <a href="{{route('login')}}" class="btn-login">Back Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Login End-->
@endsection
