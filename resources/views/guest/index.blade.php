@extends('layouts.guest')
 <!--               'ordersDishes' => $orderDishesTemp,
                    'restaurant' => $restaurant,
                    'table' => $table,
                    'order' => $order,
                    'dishes' => $dishes,
                    'dishesRestaurant' => $dishesRestaurant, -->
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            @if (($order->status) == "NotConfirm")
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Order for {{$restaurant->name}} in {{$table->alias}}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>Menu</th>
                                    <th>price</th>
                                    <th>describe</th>
                                    <th>pic</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($dishesRestaurant as $dish)
                                        <tr>
                                            <td class="table-text"><div>{{ $dish->name }}</div></td>
                                            <td class="table-text"><div>{{ $dish->price }}</div></td>
                                            <td class="table-text"><div>{{ $dish->description }}</div></td>
                                            <td class="table-img"><div><img src={{asset('uploads/'.($dish->id).'.jpg')}}  alt="图片加载失败" width="150" height="150" /></div></td>
                                            <!-- Dish Add Button -->
                                            <td>
                                                <form action="/guest/create/{{$dish->id}}/{{$order ->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <!-- {{ method_field('DELETE') }} -->
                                                <button type="submit" id="delete-dish-{{ $dish->id }}" class="btn btn-danger">
                                                    <i class=""></i>Add
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            @endif
            <!-- Current Dish -->
            @if(count($ordersDishes)>0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Dishes for {{$restaurant->name}} in {{$table->alias}}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Dish</th>
                                <th>price</th>
                                <th>num</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($ordersDishes); $i++)
                                    <tr>
                                        <td class="table-text"><div>{{ $dishes[$i]->name }}</div></td>
                                        <td class="table-text"><div>{{ $dishes[$i]->price }}</div></td>
                                        <td class="table-text"><div>{{ $ordersDishes[$i]->amount }}</div></td>
                                        <td class="table-text"><div>{{ $ordersDishes[$i]->status}}</div></td>
                                        <!-- Dish Delete Button -->
                                        @if ($ordersDishes[$i]->status == "NotStart")
                                        <td>
                                            <form action="/guest/delete/{{$ordersDishes[$i]->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <!-- {{ method_field('DELETE') }} -->

                                                <button type="submit" id="delete-dish-{{ $ordersDishes[$i]->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Total: {{ $order->total}}</label>
                        </div>
                        @if (($order->status) == "NotConfirm")
                        <form action="/guest/confirm/{{$order ->id}}" method="POST">
                            {{ csrf_field() }}
                            <!-- {{ method_field('DELETE') }} -->
                            <div class="form-group">
                            <label for="dish-name" class="col-sm-3 control-label">Remark</label>

                            <div class="col-sm-6">
                                <input type="text" name="remark" id="remark" class="form-control" placeholder="填写备注">
                            </div>
                            </div>
                            <button type="submit" id="delete-dish-{{ $order->id }}" class="btn btn-danger">
                                <i class=""></i>Confirm Order
                            </button>
                        </form>
                        @else
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Remark: {{ $order->remark}}</label>
                        </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection