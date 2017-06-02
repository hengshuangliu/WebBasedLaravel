@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Dish for {{ $restaurant->name }}
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Restaurant Form -->
					<form action="/dish/store/{{$restaurant -> id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Dish Name -->
						<div class="form-group">
							<label for="dish-name" class="col-sm-3 control-label">菜名</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="dish-name" class="form-control" value="{{ old('dish') }}">
							</div>
						</div>

						<!-- Dish Description -->
						<div class="form-group">
							<label for="dish-description" class="col-sm-3 control-label">描述</label>

							<div class="col-sm-6">
								<input type="text" name="description" id="dish-description" class="form-control" value="{{ old('description') }}">
							</div>
						</div>

						<!-- Dish Price -->
						<div class="form-group">
							<label for="dish-price" class="col-sm-3 control-label">单价</label>

							<div class="col-sm-6">
								<input type="text" name="price" id="dish-price" class="form-control" value="{{ old('price') }}">
							</div>
						</div>

						<!-- Dish PicNum -->
						<div class="form-group">
							<label for="dish-picNum" class="col-sm-3 control-label">上传图片</label>

							<div class="col-sm-6">
								<input type="file" name="file" id="dish-file" class="form-control">
							</div>
						</div>

						<!-- Add Dish Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>添加
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Dish -->
			@if (count($dishes) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Dishes
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Dish</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($dishes as $dish)
									<tr>
										<td class="table-text"><div>{{ $dish->name }}</div></td>
										<td class="table-text"><div>{{ $dish->price }}</div></td>
										<td class="table-text"><div>{{ $dish->description }}</div></td>
										</tr>
										<tr>
										<td class="table-img"><div><img src={{asset('uploads/'.($dish->id).'.jpg')}}  alt="图片加载失败" width="200" height="200" /></div></td>


										<!-- Dish Delete Button -->
										<td>

											<form action="/dish/delete/{{ $dish->id }}" method="POST">
												{{ csrf_field() }}
												<!-- {{ method_field('DELETE') }} -->

												<button type="submit" id="delete-dish-{{ $dish->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
											</td>
											<td>
											<form action="/dish/modify/index/{{ $dish->id }}" method="POST">
												{{ csrf_field() }}
												<!-- {{ method_field('DELETE') }} -->

												<button type="submit" id="modify-dish-{{ $dish->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>进行修改
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
