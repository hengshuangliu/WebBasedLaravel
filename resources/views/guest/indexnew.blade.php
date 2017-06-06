@extends('layouts.guest')
 <!--
                    'restaurant' => $restaurant,
                    'table' => $table,
                    'order' => $order,
                    'dishesRestaurant' => $dishesRestaurant, -->
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @if (($order->status) == "NotConfirm")
            <div class="col-md-12 column">
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
            <div>
            <ul class="nav navbar-nav nav-tabs">
             <li class="active"><a href="#menu">菜单</a></li>
             <li><a href="#order">已点</a></li>
            </ul>
            </div>
            </nav>
            </div>

            <div class="col-md-12 column">
            <a name="menu"></a>
            <div class="panel panel-default bg-info">
            <div class="panel-heading">
                <div class="text-danger">
                <h4>
                    {{$restaurant->name}} <small>桌名：{{$table->alias}}</small>
                </h4>
                </div>

                </div>
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                        <div name="menu" class="panel-body">
                        @foreach ($dishesRestaurant as $dish)
                        <div class="col-sm-6 col-md-3"  style="padding: 20px 20px 20px 20px;">
                              <div>
                                 <img src={{asset('uploads/'.($dish->id).'.jpg')}} alt="图片加载失败" width="150" height="150" class="thumbnail" >
                              </div>
                              <div class="caption">
                                 <h5>{{ $dish->name }}</h5> <h4>售价：{{ $dish->price }}</h4>
                                 <p>{{ $dish->description }}</p>
                                 <p>
                                    <button onclick="ajaxLoad('/guest/create/{{$dish->id}}/{{$order ->id}}')"  class="btn"><i class=""></i>Add</button>
                                 </p>
                              </div>
                           </div>
                        @endforeach
                        </div>
                </div>
            </div>
            @endif
            <!-- Current Dish -->
                <a name="order"></a>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Dishes for {{$restaurant->name}} in {{$table->alias}}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Dish</th>
                                <th>price</th>
                                <th>amount</th>
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
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>

                        <div class="form-group">
                        <label id="total" class="col-sm-3 control-label">Total: {{ $order->total}}</label>
                        </div>
                        @if (($order->status) == "NotConfirm")
                        <form action="/guest/confirm/{{$order ->id}}" method="POST">
                            {{ csrf_field() }}
                            <!-- {{ method_field('DELETE') }} -->
                            <div class="form-group">
                            <label for="dish-name" class="col-sm-2 control-label">Remark</label>
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
        </div>
    </div>
@endsection
