@extends('layouts.base')
@section('content')
    <main id="main" class="main-site left-sidebar">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>Register</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="register-form form-item ">
                                <form class="form-stl" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Create an account</h3>
                                        <h4 class="form-subtitle">Personal infomation</h4>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Full Name*</label>
                                        <input type="text" id="frm-reg-lname" name="name" placeholder="Full Name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Username*</label>
                                        <input type="text" id="frm-reg-lname" name="username" placeholder="Username*">
                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-email">Email Address*</label>
                                        <input type="email" id="frm-reg-email" name="email" placeholder="Email address">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="wrap-functions ">
                                        <label class="remember-field">
                                            <input name="newletter" id="new-letter" value="forever"
                                                type="checkbox"><span>Sign Up for Newsletter</span>
                                        </label>
                                    </fieldset>
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Login Information</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half left-item ">
                                        <label for="frm-reg-pass">Password *</label>
                                        <input type="password" id="frm-reg-pass" name="password" placeholder="Password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half ">
                                        <label for="frm-reg-cfpass">Confirm Password *</label>
                                        <input type="password" id="frm-reg-cfpass" name="password_confirmation"
                                            placeholder="Confirm Password">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                    </fieldset>
                                    <input type="submit" class="btn btn-sign btn-block" value="Register" name="register">
                                </form>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </main>
@endsection
