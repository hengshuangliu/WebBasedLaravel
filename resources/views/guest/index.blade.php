@extends('layouts.app')
 <!--               'ordersDishes' => $orderDishesTemp,
                    'restaurant' => $restaurant,
                    'table' => $table,
                    'order' => $order,
                    'dishes' => $dishes,
                    'dishesRestaurant' => $dishesRestaurant, -->
@section('content')
    <div class="container">
     @if (($order->status) == "NotConfirm")
        <legend  style="margin-top:10%;font-size: 200%">
            {{ $restaurant->name }}菜单
        </legend>
        <legend  font-size: 200%">
            当前桌号：{{$table->alias}}
        </legend>
        @foreach ($dishesRestaurant as $dish)
        <div class="row clearfix" style="margin-top:5%">
            <div class="col-md-12 column">
                <div class="row clearfix">
                    <div class="col-md-4 column">
                         <div class="div div-default">菜名：{{ $dish->name }}</div>
                         <div class="div div-default">价格：{{ $dish->price }}元</div>
                         <div class="div div-default">描述：{{ $dish->description }}</div>
                    </div>
                    <div class="col-md-4 column">
                         <div><img src={{asset('uploads/'.($dish->id).'.jpg')}}  alt="图片加载失败" width="200" height="200" /></div>
                    </div>
                    <div class="col-md-4 column">
                        <form action="/guest/create/{{$dish->id}}/{{$order ->id}}" method="POST">
                            {{ csrf_field() }}
                            <!-- {{ method_field('DELETE') }} -->
                            <button type="submit" id="delete-dish-{{ $dish->id }}" class="btn btn-default">
                                <i class=""></i>点单
                            </button>
                        </form>
                    </div>
                </div>
                <legend></legend>
            </div>
        </div>
        @endforeach
    @endif

    @if(count($ordersDishes)>0)
        <legend  style="margin-top:10%;font-size: 200%">
            已点菜品
        </legend>
        @for ($i = 0; $i < count($ordersDishes); $i++)
        <div class="row clearfix" style="margin-top:5%">
            <div class="col-md-12 column">

                <div class="row clearfix">
                    <div class="col-md-2 column">
                         <div>菜名：{{ $dishes[$i]->name }}</div>
                    </div>
                    <div class="col-md-2 column">
                         <div>单价：{{ $dishes[$i]->price }}元</div>
                    </div>
                    <div class="col-md-2 column">
                        <div>数量：{{ $ordersDishes[$i]->amount }}</div>
                    </div>
                    <div class="col-md-2 column">
                        <div>制作状态：{{ $ordersDishes[$i]->status}}</div>
                    </div>
                    <div class="col-md-4 column">
                        <!-- Dish Delete Button -->
                        @if ($ordersDishes[$i]->status == "NotStart")
                        <form action="/guest/delete/{{$ordersDishes[$i]->id}}" method="POST">
                            {{ csrf_field() }}
                            <!-- {{ method_field('DELETE') }} -->

                            <button type="submit" id="delete-dish-{{ $ordersDishes[$i]->id }}" class="btn btn-default">
                                <i class="fa fa-btn fa-trash"></i>删除菜品
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                <legend></legend>
            </div>
        </div>
        @endfor
        <div class="row clearfix" style="margin-top:5%">
            <div class="col-md-12 column">
                <div class="row clearfix">
                    <div class="col-md-3 column">
                        <label class="col-sm-3 control-label">Total: {{ $order->total}}元</label>
                    </div>
                    @if (($order->status) == "NotConfirm")
                        <form action="/guest/confirm/{{$order ->id}}" method="POST">
                        {{ csrf_field() }}
                        <!-- {{ method_field('DELETE') }} -->
                        <div class="col-sm-5">
                        <label for="dish-name"  control-label">备注</label>
                            <input style="margin-bottom:5%" type="text" name="remark" id="remark" class="form-control" placeholder="填写备注">
                        </div>
                        <div class="col-sm-4">
                        <button type="submit" id="delete-dish-{{ $order->id }}" class="btn btn-default">
                            <i class=""></i>确认下单
                        </button>
                        </div>
                        </form>
                         @else
                        <div style="margin-bottom:5%">
                            <label  class="col-sm-3 control-label">备注: {{ $order->remark}}</label>
                        </div>
                        @endif
                        </div>
                    </div>
            </div>
        </div>
    @endif
@endsection
