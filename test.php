@if (count($dishes) > 0)
				<legend  style="margin-top:10%;font-size: 200%">
					菜单
				</legend>
				@foreach ($dishes as $dish)
				<div class="row clearfix" style="margin-top:5%">
					<div class="col-md-12 column">
						<div class="row clearfix">
							<div class="col-md-3 column">
								 <div class="div div-default">菜名：{{ $dish->name }}</div>
								 <div class="div div-default">价格：{{ $dish->price }}元</div>
								 <div class="div div-default">描述：{{ $dish->description }}</div>
							</div>
							<div class="col-md-3 column">
								 <div style="margin-bottom:10%;"><img src={{asset('uploads/'.($dish->id).'.jpg')}}  alt="图片加载失败" width="200" height="200" /></div>
							</div>
							<div class="col-md-3 column">
								<form action="/dish/modify/index/{{ $dish->id }}" method="POST">
									{{ csrf_field() }}
									<!-- {{ method_field('DELETE') }} -->

									<button type="submit" id="modify-dish-{{ $dish->id }}" class="btn btn-danger">
										<i ></i>修改菜品信息
									</button>
								</form>
							</div>
							<div class="col-md-3 column">
								<form action="/dish/delete/{{ $dish->id }}" method="POST">
									{{ csrf_field() }}
									<!-- {{ method_field('DELETE') }} -->

									<button type="submit" id="delete-dish-{{ $dish->id }}" class="btn btn-danger">
										<i></i>删除菜品
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif