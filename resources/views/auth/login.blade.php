@extends('layouts.base')

@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />
<main id="main" class="main-site left-sidebar">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">						
                        <div class="login-form form-item form-stl">
                            <form name="frm-login" method="POST" action="{{ route('login') }}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Log in to your account</h3>										
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="text" id="frm-login-uname" name="email" :value="old('email')" placeholder="Type your email address">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Password:</label>
                                    <input type="password" :value="__('Password')" id="frm-login-pass" name="password" autocomplete="current-password" placeholder="************">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </fieldset>
                                
                                <fieldset class="wrap-input">
                                    <label class="remember-field">
                                        <input class="frm-input " name="remember" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
                                    </label>
                                    <a class="link-function left-position" href="{{ route('password.request') }}" title="Forgotten password?">Forgotten password?</a>
                                </fieldset>
                                <input type="submit" class="btn btn-submit btn-block" value="Login" name="submit">
                            </form>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('auth.google') }}" class="btn btn-success btn-block">Login with Google</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('auth.facebook') }}" class="btn btn-success btn-block">Login with Facebook</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('auth.linkedin') }}" class="btn btn-success btn-block">Login with Linkedin</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('auth.twitter') }}" class="btn btn-success btn-block">Login with Twitter</a>
                                </div>
                            </div>
                        </div>												
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->
    </div><!--end container-->
</main>
@endsection



