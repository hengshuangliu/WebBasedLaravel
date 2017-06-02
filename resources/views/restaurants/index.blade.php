@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row-fluid">
		<!-- Add Restaurant -->
			<div class="span6">
				<!-- Display Validation Errors -->
					@include('common.errors')
				<form action="/restaurant" method="POST">
					{{ csrf_field() }}
					<fieldset>
						 <legend>添加店铺</legend>
						 <label>餐厅名称</label>
						 <input type="text" name="name" id="restaurant-name" class="form-control" value="{{ old('restaurant') }}">
						 <label>地址</label>
						 <input type="text" name="address" id="restaurant-address" class="form-control" value="{{ old('address') }}">
						 <label>商业许可证号</label>
						 <input type="text" name="businessLicense" id="restaurant-businessLicense" class="form-control" value="{{ old('businessLicense') }}">
						 <button type="submit" class="btn" style="margin-top:5%">提交</button>
					</fieldset>
				</form>
			</div>

			<!-- Current Restaurant -->
			@if (count($restaurants) > 0)
				<div style="margin-top:10%;font-size: 200%;">
					我的餐厅
				</div>
				@foreach ($restaurants as $restaurant)
					<li><div>{{ $restaurant->name }}
								 <a margin-top:10% href="#"><div><a href="/dishes/{{ $restaurant->id }}"> 修改菜单 </a></div></a>
								 <a href="#"><div><a href="/tables/{{ $restaurant->id }}"> 修改桌号 </a></div></a>
								 <a href="#"><div><a href="/orders/{{ $restaurant->id }}"> 订单查询 </a></div></a>
								 <a href="#"><div><a href="/ordersDishes/{{$restaurant->id}}">菜品订单</a></div></a>
						</div>
						<form action="/restaurant/{{ $restaurant->id }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}

							<button style="margin-left:30%;margin-bottom:5%" type="submit" id="delete-restaurant-{{ $restaurant->id }}" class="btn btn-danger">
								<i class="fa fa-btn fa-trash"></i>删除餐厅
							</button>
						</form>
					</li>
				</u1>
				@endforeach
			@endif
		</div>
	</div>
@endsection
