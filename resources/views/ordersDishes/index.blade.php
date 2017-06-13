@extends('layouts.app')
<!-- 'ordersDishesTemp' => $ordersDishesTemp,
            'tablesTemp' => $tablesTemp,
            'restaurant' => $restaurant, -->
@section('content')
    <div class="container">
        <div>
            <legend>{{ $restaurant->name }}</legend>
            <div class="panel panel-default">
                <div class="panel-heading">
                    菜品订单
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>未制作</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td class="table-text"><div>菜名</div></td>
                                            <td class="table-text"><div>数量</div></td>
                                            <td class="table-text"><div>桌号</div></td>
                                            <td class="table-text"><div>状态</div></td>
                                        </tr>
                                        @for ($i = 0; $i < count($ordersDishesTemp); $i++)
                                        @if($ordersDishesTemp[$i]->status === "NotStart")
                                        <tr>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->name }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->amount }}</div></td>
                                            <td class="table-text"><div>{{ $tablesTemp[$i]->alias }}</div></td>
                                            <!-- Order modify Button -->
                                            <td>
                                                <form action="/orderDish/{{$ordersDishesTemp[$i]->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" id="delete-dish-{{ $ordersDishesTemp[$i]->id }}" class="btn btn-default">
                                                    <i></i>准备制作
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endfor
                                </tbody>
                            </table>

                            <table class="table table-striped task-table">
                                <thead>
                                    <th>正在制作</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td class="table-text"><div>菜名</div></td>
                                            <td class="table-text"><div>数量</div></td>
                                            <td class="table-text"><div>桌号</div></td>
                                            <td class="table-text"><div>状态</div></td>
                                        </tr>
                                        @for ($i = 0; $i < count($ordersDishesTemp); $i++)
                                        @if($ordersDishesTemp[$i]->status === "Making")
                                        <tr>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->name }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->amount }}</div></td>
                                            <td class="table-text"><div>{{ $tablesTemp[$i]->alias }}</div></td>
                                            <!-- Order modify Button -->
                                            <td>
                                                <form action="/orderDish/{{$ordersDishesTemp[$i]->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" id="delete-dish-{{ $ordersDishesTemp[$i]->id }}" class="btn btn-default">
                                                    <i></i>制作完成
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endfor
                                </tbody>
                            </table>

                            <table class="table table-striped task-table">
                                <thead>
                                    <th>已完成</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td class="table-text"><div>菜名</div></td>
                                            <td class="table-text"><div>数量</div></td>
                                            <td class="table-text"><div>桌号</div></td>
                                        </tr>
                                        @for ($i = 0; $i < count($ordersDishesTemp); $i++)
                                        @if($ordersDishesTemp[$i]->status === "Finished")
                                        <tr>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->name }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->amount }}</div></td>
                                            <td class="table-text"><div>{{ $tablesTemp[$i]->alias }}</div></td>
                                             <!-- Order modify Button -->
                                        </tr>
                                        @endif
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
