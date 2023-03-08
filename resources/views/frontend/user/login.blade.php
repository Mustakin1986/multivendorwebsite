@extends('frontend.master')

@section('content')
<main class="content_vendor_login ">
        @if (session()->has('success'))
        <div class=" alert alert-success">{{ session()->get('success')}}</div>
        @endif

        @if (session()->has('error'))
        <div class=" alert alert-danger">{{ session()->get('error')}}</div>
        @endif

    <div class="log-in tbtn is-active">Login</div>

    <form action="{{ route('login') }}" id="login-form" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="Enter Email">
        <input type="password" name="password" placeholder="Enter password">
        <div class="check-area"><input type="checkbox" name="password-save" value="remember-pass">
        <label for="password-save">Remember Password</label></div>
        <input type="submit" value="Log in" id="btn">
    </form>
</main>
@endsection
