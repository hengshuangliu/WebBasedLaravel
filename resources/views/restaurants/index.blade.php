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
				<div  style="margin-top:10%;font-size: 200%">
					我的餐厅
				</div>
				@foreach ($restaurants as $restaurant)
				<div class="row clearfix" style="margin-top:5%">
					<div class="col-md-12 column">
						<div class="row clearfix">
							<div class="col-md-4 column">
								 <div class="div div-default">{{ $restaurant->name }}</div>
							</div>
							<div class="col-md-4 column">
								<div class="btn-group">
									 <button class="btn btn-default">修改餐厅信息</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li>
											 <div><a style="color:#000" href="/dishes/{{ $restaurant->id }}"> 修改菜单 </a>
										</li>
										<li>
											 <div><a style="color:#000" href="/tables/{{ $restaurant->id }}"> 修改桌号 </a></div></a>
										</li>
										<li>
											 <div><a style="color:#000" href="/orders/{{ $restaurant->id }}"> 订单查询 </a></div></a>
										</li>
										<li>
											<div><a style="color:#000" href="/ordersDishes/{{$restaurant->id}}">菜品订单</a></div></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-4 column">
								<form action="/restaurant/{{ $restaurant->id }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<button style="margin-left:30%;margin-bottom:10%;" type="submit" id="delete-restaurant-{{ $restaurant->id }}" class="btn btn-danger">
										<i class="fa fa-btn fa-trash"></i>删除餐厅
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif

		</div>
	</div>
@endsection
