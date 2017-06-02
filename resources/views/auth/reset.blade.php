<!-- resources/views/auth/reset.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form method="POST" action="/password/reset" class="form-horizontal">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- E-Mail Address -->
                        <div class="form-group">

                            <div class="form-field form-field--icon">
                            <i class="icon icon-user"></i>
                                <input type="text" name="email" placeholder="e-mail" class="form-control" >
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <div class="form-field form-field--icon">
                            <i class="icon icon-user"></i>
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div>
                        </div>

                        <!-- password_confirmation -->
                        <div class="form-group">
                            <div class="form-field form-field--icon">
                            <i class="icon icon-user"></i>
                                <input type="password" name="password_confirmation" placeholder="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <!-- Reset Button -->
                        <div class="form-group">
                            <div class="form-field form-field--ops">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-sign-in"></i>重置密码
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection