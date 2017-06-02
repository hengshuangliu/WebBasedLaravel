
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="carousel slide" id="carousel-469922">
                <ol class="carousel-indicators">
                    <li class="active" data-slide-to="0" data-target="#carousel-469922">
                    </li>
                    <li data-slide-to="1" data-target="#carousel-469922">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-469922">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img alt="" src="http://ibootstrap-file.b0.upaiyun.com/lorempixel.com/1600/500/sports/1/default.jpg" />
                    </div>
                    <div class="item">
                        <img alt="" src="http://ibootstrap-file.b0.upaiyun.com/lorempixel.com/1600/500/sports/2/default.jpg" />
                    </div>
                    <div class="item">
                        <img alt="" src="http://ibootstrap-file.b0.upaiyun.com/lorempixel.com/1600/500/sports/3/default.jpg" />
                    </div>
                </div> <a class="left carousel-control" href="#carousel-469922" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-469922" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>

            <!-- Display Validation Errors -->
            @include('common.errors')
        <div class="col-md-12 column" style="margin-top:10%">
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

                <!-- Remember Me -->
<!--                         <div class="form-group">
                    <input type="checkbox" value="1"  name="remember" id="remember" class="f-check ui-checkbox" />
                    <label class="normal" for="autologin">Remember Me</label>
                </div> -->

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