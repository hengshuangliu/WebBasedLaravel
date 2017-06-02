
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div >

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/auth/register" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">姓名</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <!-- E-Mail Address -->
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">用户名/邮箱</label>

                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>

                        <!-- Telephone -->
                        <div class="form-group">
                            <label for="telephone" class="col-sm-3 control-label">电话</label>

                            <div class="col-sm-6">
                                <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">密码</label>

                            <div class="col-sm-6">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation" class="col-sm-3 control-label">确认密码</label>

                            <div class="col-sm-6">
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-sign-in"></i>注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
