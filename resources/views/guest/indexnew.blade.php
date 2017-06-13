@extends('layouts.guest')
 <!--
                    'restaurant' => $restaurant,
                    'table' => $table,
                    'order' => $order,
                    'dishesRestaurant' => $dishesRestaurant, -->
@section('content')
    <style type="text/css" media="screen">
        li{float: left;list-style:none;}
    </style>
    <div class="container">
        <div>
            @if (($order->status) == "NotConfirm")
            <div class="col-xs-12 column">
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
            <div>
            <ul >
             <li style="margin-left:25%"><a href="#menu">菜单</a></li>
             <li style="margin-left:25%"><a href="#order">已点</a></li>
            </ul>
            </div>
            </nav>
            </div>
        </div>

            <div>
            <a name="menu"></a>
                <legend  style="font-size: 200%">
                    {{$restaurant->name}} <small>桌名：{{$table->alias}}</small>
                </legend>
                 <!-- Display Validation Errors -->
                    @include('common.errors')
                    @foreach ($dishesRestaurant as $dish)
                    <div class="row clearfix">
                    <div class="col-xs-4 column" display:inline>
                        <img src={{asset('uploads/'.($dish->id).'.jpg')}} alt="图片加载失败" width="100" height="100" class="thumbnail" >
                    </div>
                    <div class="col-xs-4 column" display:inline>
                        <div >{{ $dish->name }}</div >
                        <div >售价：{{ $dish->price }}</div >
                        <div >{{ $dish->description }}</div >
                    </div>
                    <div class="col-xs-4 column" display:inline>
                         <p>
                            <button onclick="ajaxLoad('/guest/create/{{$dish->id}}/{{$order ->id}}')"  ><i></i>添加</button>
                         </p>
                    </div>
                    </div>
                 <legend></legend>
            @endforeach
            </div>
            @endif

            <!-- Current Dish -->
                <a name="order"></a>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        已点菜品
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>菜名</th>
                                <th>单价</th>
                                <th>数量</th>
                                @if ($order->status !== "NotConfirm")
                                <th>status</th>
                                @endif
                                <th>&nbsp;</th>
                            </thead>
                            <tbody id="for-current-dishes">
                            @if(count($ordersDishes)>0)
                                @for ($i = 0; $i < count($ordersDishes); $i++)
                                    <tr id="orderDish-{{$ordersDishes[$i]->id}}">
                                        <td class="table-text"><div>{{ $dishes[$i]->name }}</div></td>
                                        <td class="table-text"><div>{{ $dishes[$i]->price }}</div></td>
                                        <td class="table-text"><div for="amount">{{ $ordersDishes[$i]->amount }}</div></td>
                                        @if ($order->status !== "NotConfirm")
                                        <td class="table-text"><div>{{ $ordersDishes[$i]->status }}</div></td>
                                        @endif
                                        @if ($ordersDishes[$i]->status == "NotStart")
                                        <td>
                                            <button onclick="dishDel('/guest/destroy/orderDish/{{$ordersDishes[$i]->id}}')" class="btn">
                                                <i class="fa fa-btn fa-trash"></i>删除
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>

                        <div class="form-group">
                        <label id="total" class="col-sm-3 control-label">总价: {{ $order->total}}</label>
                        </div>
                        @if (($order->status) == "NotConfirm")
                        <form action="/guest/confirm/{{$order ->id}}" method="POST">
                            {{ csrf_field() }}
                            <!-- {{ method_field('DELETE') }} -->
                            <div class="form-group">
                            <label for="dish-name" class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-10">
                                <input type="text" name="remark" id="remark" class="form-control" placeholder="填写备注">
                            </div>
                            </div>
                            <button type="submit" id="confirm-order-{{ $order->id }}" class="btn btn-success">
                                <i class=""></i>确认订单
                            </button>
                        </form>
                        @else
                        <div class="form-group">
                            <label class="col-sm-3 control-label">订单备注: {{ $order->remark}}</label>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
@endsection
