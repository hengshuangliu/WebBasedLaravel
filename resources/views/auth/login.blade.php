
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="promotion-banner">
                     <img src="/pic/login.png" width=100% height=200%/>
                </div>
        </div>

            <!-- Display Validation Errors -->
            @include('common.errors')
        <div class="col-md-12 column" style="margin-top:3%">
            <!-- New Task Form -->
            <form action="/auth/login" method="POST" role="form">
                {{ csrf_field() }}


                <!-- E-Mail Address -->
                <div class="form-group">

                    <div class=class="form-field form-field--icon">
                    <i class="icon icon-user"></i>
                        <input type="text" name="email" placeholder="用户名/邮箱" class="form-control" >
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="form-field form-field--icon">
                    <i class="icon icon-user"></i>
                        <input type="password" name="password" placeholder="密码" class="form-control">
                    </div>
                </div>
                <!-- Forget Password -->
                <div class="form-group">
                    <label class="normal" ><a href="/password/email">忘记密码</a></label>
                </div>

                <!-- Login Button -->
                <div class="form-group">
                    <div "form-field form-field--ops">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-sign-in" style="color:#000"></i>登陆
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection