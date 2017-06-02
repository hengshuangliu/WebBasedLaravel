@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Restaurant
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Restaurant Form -->
					<form action="/restaurant" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Restaurant Name -->
						<div class="form-group">
							<label for="restaurant-name" class="col-sm-3 control-label">Restaurant</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="restaurant-name" class="form-control" value="{{ old('restaurant') }}">
							</div>
						</div>

						<!-- Restaurant Address -->
						<div class="form-group">
							<label for="restaurant-address" class="col-sm-3 control-label">Address</label>

							<div class="col-sm-6">
								<input type="text" name="address" id="restaurant-address" class="form-control" value="{{ old('address') }}">
							</div>
						</div>

						<!-- Restaurant BusinessLicense -->
						<div class="form-group">
							<label for="restaurant-businessLicense" class="col-sm-3 control-label">BusinessLicense</label>

							<div class="col-sm-6">
								<input type="text" name="businessLicense" id="restaurant-businessLicense" class="form-control" value="{{ old('businessLicense') }}">
							</div>
						</div>

						<!-- Add Restaurant Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Restaurant
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Restaurant -->
			@if (count($restaurants) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Restaurant
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Restaurant</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($restaurants as $restaurant)
									<tr>
										<td class="table-text"><div>{{ $restaurant->name }}</div></td>
										<td class="table-text"><div><a href="/dishes/{{ $restaurant->id }}"> dishes </a></div></td>
										<td class="table-text"><div><a href="/tables/{{ $restaurant->id }}"> tables </a></div></td>
										<td class="table-text"><div><a href="/orders/{{ $restaurant->id }}"> orders </a></div></td>
										<td class="table-text"><div><a href="/ordersDishes/{{$restaurant->id}}"> ordersDishes </a></div></td>
										<!-- Restaurant Delete Button -->
										<td>
											<form action="/restaurant/{{ $restaurant->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-restaurant-{{ $restaurant->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
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
