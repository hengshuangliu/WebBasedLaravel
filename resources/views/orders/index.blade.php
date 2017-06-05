@extends('layouts.app')
<!-- 'orders' => $this->orders->forRestaurant($restaurant),
            'restaurant' => $restaurant, -->
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
        <legend>{{ $restaurant->name }}</legend>
            <div class="panel panel-default">
                <div class="panel-heading">
                   订单列表
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>未完成订单</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="table-text"><div>桌号</div></td>
                                    <td class="table-text"><div>金额</div></td>
                                    <td class="table-text"><div>时间</div></td>
                                    <td class="table-text"><div>备注</div></td>
                                    <td class="table-text"><div>当前状态</div></td>
                                </tr>
                                @foreach ($orders as $order)
                                @if($order->status === "Enjoying")
                                <tr>
                                    <td class="table-text"><div>{{ $order->alias }}</div></td>
                                    <td class="table-text"><div>{{ $order->total }}元</div></td>
                                    <td class="table-text"><div>{{ $order->updated_at }}</div></td>
                                    <td class="table-text"><div>{{ $order->remark }}</div></td>
                                    <!-- Order modify Button -->
                                    <td>
                                        <form action="/order/modify/{{$order->id}}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" id="delete-dish-{{ $order->id }}" class="btn btn-default">
                                            <i></i>已结账
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                                </tbody>
                            </table>
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>已完成订单</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="table-text"><div>桌号</div></td>
                                    <td class="table-text"><div>金额</div></td>
                                    <td class="table-text"><div>时间</div></td>
                                    <td class="table-text"><div>备注</div></td>
                                    <td class="table-text"><div>当前状态</div></td>
                                </tr>
                                @foreach ($orders as $order)
                                @if($order->status === "Finished")
                                <tr>
                                    <td class="table-text"><div>{{ $order->alias }}</div></td>
                                    <td class="table-text"><div>{{ $order->total }}元</div></td>
                                    <td class="table-text"><div>{{ $order->updated_at }}</div></td>
                                    <td class="table-text"><div>{{ $order->remark }}</div></td>
                                     <td>
                                        <form >
                                        <button class="btn btn-default">
                                            <i></i>已完成
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                                </tbody>
                            </table>

                            <table class="table table-striped task-table">
                                <thead>
                                    <th>未确认订单</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="table-text"><div>桌号</div></td>
                                    <td class="table-text"><div>金额</div></td>
                                    <td class="table-text"><div>时间</div></td>
                                    <td class="table-text"><div>备注</div></td>
                                    <td class="table-text"><div>当前状态</div></td>
                                </tr>
                                @foreach ($orders as $order)
                                @if($order->status === "NotConfirm")

                                <tr>
                                    <td class="table-text"><div>{{ $order->alias }}</div></td>
                                    <td class="table-text"><div>{{ $order->total }}</div></td>
                                    <td class="table-text"><div>{{ $order->updated_at }}</div></td>
                                    <td class="table-text"><div>{{ $order->remark }}</div></td>
                                    <!-- Order modify Button -->
                                    <td>
                                        <form action="/order/modify/{{$order->id}}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" id="delete-dish-{{ $order->id }}" class="btn btn-default">
                                            <i></i>已确认
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
