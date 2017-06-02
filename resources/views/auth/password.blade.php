<!-- resources/views/auth/password.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-sm-offset-2 col-sm-8">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form method="POST" action="/password/email" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- E-Mail Address -->
                        <div class="form-group">

                            <div class="form-field form-field--icon">
                            <i class="icon icon-user"></i>
                                <input type="text" name="email" placeholder="e-mail" class="form-control" >
                            </div>
                        </div>

                        <!-- submit Button -->
                        <div class="form-group">
                            <div class="form-field form-field--ops">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-sign-in"></i>发送重置密码邮件
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
@endsection