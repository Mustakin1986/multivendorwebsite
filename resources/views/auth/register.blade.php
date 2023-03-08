@extends('frontend.master')

@section('content')
<main class="content_vendor_login ">
        @if (session()->has('success'))
        <div class=" alert alert-success">{{ session()->get('success')}}</div>
        @endif

        @if (session()->has('error'))
        <div class=" alert alert-danger">{{ session()->get('error')}}</div>
        @endif
    <div class="register tbtn">Register</div>
    <form action="{{ route('register') }}"  class="hidden" method="post">
        @csrf
        <input type="text" name="name" id="first-name" placeholder="First Name">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="tel" name="phone" id="phone" placeholder="Enter Your Phone Numer">
        <input type="password" name="password" id="psw" placeholder="Password">
        <textarea class="form-control" name="address" rows="3" placeholder="Enter Address"></textarea>
        <div class="check-area"><input type="checkbox" name="terms-agree" value="yes">
        <label for="terms-agree">I agree to the terms and conditions</label></div>
        <input type="submit" value="Register" id="btn">
    </form>
</main>
@endsection
