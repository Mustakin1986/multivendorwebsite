@extends('frontend.master')

@section('content')
<main class="content_vendor_login ">
        @if (session()->has('success'))
        <div class=" alert alert-success">{{ session()->get('success')}}</div>
        @endif

        @if (session()->has('error'))
        <div class=" alert alert-danger">{{ session()->get('error')}}</div>
        @endif

    <div class="toggle-button">
    <div class="log-in tbtn is-active">Log In</div>
    <div class="register tbtn">Register</div>
    </div>

    <form action="{{ route('login') }}" id="login-form" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="Enter Email">
        <input type="password" name="password" placeholder="Enter password">
        <div class="check-area"><input type="checkbox" name="password-save" value="remember-pass">
        <label for="password-save">Remember Password</label></div>
        <input type="submit" value="Log in" id="btn">
    </form>

    <form action="{{ route('register') }}" id="register-form" class="hidden" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="first-name" placeholder="First Name">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="tel" name="phone" id="phone" placeholder="Enter Your Phone Numer">
        <textarea class="form-control" name="address" rows="3" placeholder="Enter Address"></textarea>
        <input type="password" name="password" id="psw" placeholder="Password">
        <div class="check-area"><input type="checkbox" name="terms-agree" value="yes">
        <label for="terms-agree">I agree to the terms and conditions</label></div>
        <input type="submit" value="Register" id="btn">
    </form>
</main>
@endsection
