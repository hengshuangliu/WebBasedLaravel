@extends('layouts.app')
<!-- 'ordersDishesTemp' => $ordersDishesTemp,
            'tablesTemp' => $tablesTemp,
            'restaurant' => $restaurant, -->
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dishes for {{$restaurant->name}}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th>NotStart</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                        @for ($i = 0; $i < count($ordersDishesTemp); $i++)
                                        @if($ordersDishesTemp[$i]->status === "NotStart")
                                        <tr>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->name }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->picNum }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->amount }}</div></td>
                                            <td class="table-text"><div>{{ $tablesTemp[$i]->alias }}</div></td>
                                            <!-- Order modify Button -->
                                            <td>
                                                <form action="/orderDish/{{$ordersDishesTemp[$i]->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" id="delete-dish-{{ $ordersDishesTemp[$i]->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>准备制作
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
                                    <th>Making</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                        @for ($i = 0; $i < count($ordersDishesTemp); $i++)
                                        @if($ordersDishesTemp[$i]->status === "Making")
                                        <tr>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->name }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->picNum }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->amount }}</div></td>
                                            <td class="table-text"><div>{{ $tablesTemp[$i]->alias }}</div></td>
                                            <!-- Order modify Button -->
                                            <td>
                                                <form action="/orderDish/{{$ordersDishesTemp[$i]->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" id="delete-dish-{{ $ordersDishesTemp[$i]->id }}" class="btn btn-danger">
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
                                    <th>Finished</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                        @for ($i = 0; $i < count($ordersDishesTemp); $i++)
                                        @if($ordersDishesTemp[$i]->status === "Finished")
                                        <tr>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->name }}</div></td>
                                            <td class="table-text"><div>{{ $ordersDishesTemp[$i]->picNum }}</div></td>
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
