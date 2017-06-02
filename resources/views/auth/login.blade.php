
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="">
                <div class="">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/auth/login" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="promotion-banner">
                         <img src="//s0.meituan.net/bs/file/?f&#x3D;fe-sso-fs:build/page/static/banner/www.jpg" width="540" height="400"/>
                        </div>
                        <!-- E-Mail Address -->
                        <div class="form-group">

                            <div class=class="form-field form-field--icon">
                            <i class="icon icon-user"></i>
                                <input type="text" name="email" placeholder="e-mail" class="form-control" >
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <div class="form-field form-field--icon">
                            <i class="icon icon-user"></i>
                                <input type="text" name="password" placeholder="password" class="form-control">
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group">
                            <input type="checkbox" value="1"  name="auto_login" id="autologin" class="f-check ui-checkbox" />
                            <label class="normal" for="autologin">Remember Me</label>
                        </div>

                        <!-- Login Button -->
                        <div class="form-group">
                            <div "form-field form-field--ops">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection