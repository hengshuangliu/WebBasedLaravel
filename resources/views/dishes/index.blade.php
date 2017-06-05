@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row-fluid">

			<!-- Current Dish -->
			@if (count($dishes) > 0)
				<legend  style="font-size: 200%">
					菜单
				</legend>
				<div class="row clearfix">
					<div class="col-md-12 column">
						<div class="row clearfix">
						@foreach ($dishes as $dish)
							<div class="col-md-6 column">
							<div class="row clearfix">
								<div style="margin-bottom:10%;"><img src={{asset('uploads/'.($dish->id).'.jpg')}}  alt="图片加载失败" /></div>
								<div class="col-md-4 column">
									<div class="div div-default">{{ $dish->name }}</div>
								    <div class="div div-default">价格：{{ $dish->price }}元</div>
									<div class="div div-default">描述：{{ $dish->description }}</div>
								</div>
								<div class="col-md-2 column">
									<form action="/dish/modify/index/{{ $dish->id }}" method="POST">
										{{ csrf_field() }}
										<!-- {{ method_field('DELETE') }} -->

										<button type="submit" id="modify-dish-{{ $dish->id }}" class="btn btn-default">
											<i ></i>修改
										</button>
									</form>
									<form action="/dish/delete/{{ $dish->id }}" method="POST">
										{{ csrf_field() }}
										<!-- {{ method_field('DELETE') }} -->

										<button type="submit" id="delete-dish-{{ $dish->id }}" class="btn btn-default">
											<i class="fa fa-btn fa-trash"></i>删除
										</button>
									</form>
								</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div>
				<legend style="margin-top: 5%;margin-bottom: 5%;"></legend>
			@endif
			<!-- Add Restaurant -->
			<div class="span6">
				<!-- Display Validation Errors -->
					@include('common.errors')
				<form action="/dish/store/{{$restaurant -> id}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<fieldset>
						 <legend style="margin-top:5%;">添加菜品({{ $restaurant->name }})</legend>
						 <label>菜名</label>
						 <input type="text" name="name" id="dish-name" class="form-control" value="{{ old('dish') }}">
						 <label>描述</label>
						 <input type="text" name="description" id="dish-description" class="form-control" value="{{ old('description') }}">
						 <label>单价</label>
						 <input type="text" name="price" id="dish-price" class="form-control" value="{{ old('price') }}">
						 <label>上传图片</label>
						 <input type="file" name="file" id="dish-file" class="form-control">
						 <button type="submit" class="btn btn-default" style="margin-top:5%">添加菜品</button>
					</fieldset>
				</form>
			</div>

		</div>
	</div>
@endsection
