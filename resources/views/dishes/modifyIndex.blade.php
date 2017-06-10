@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   正在修改菜名 {{ $dish->name }}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Restaurant Form -->
                    <form action="/dish/modify/{{$dish -> id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Dish Name -->
                        <div class="form-group">
                            <label for="dish-name" class="col-sm-3 control-label">菜名</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="dish-name" class="form-control" value="{{$dish->name}}">
                            </div>
                        </div>

                        <!-- Dish Description -->
                        <div class="form-group">
                            <label for="dish-description" class="col-sm-3 control-label">描述</label>

                            <div class="col-sm-6">
                                <input type="text" name="description" id="dish-description" class="form-control" value="{{$dish->description}}">
                            </div>
                        </div>

                        <!-- Dish Price -->
                        <div class="form-group">
                            <label for="dish-price" class="col-sm-3 control-label">单价</label>

                            <div class="col-sm-6">
                                <input type="text" name="price" id="dish-price" class="form-control" value="{{$dish->price}}元">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dish-picNum" class="col-sm-3 control-label">图片</label>
                            <div ><img src={{asset('uploads/'.($dish->id).'.jpg')}}  alt="图片加载失败" width="200" height="200" />
                            </div>
                        </div>

                        <!-- Dish PicNum -->
                        <div class="form-group">
                            <label for="dish-picNum" class="col-sm-3 control-label">上传图片</label>

                            <div class="col-sm-6">
                                <input type="file" name="file" id="dish-file" class="form-control">
                            </div>
                        </div>

                        <!-- Add Dish Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>确认修改
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
