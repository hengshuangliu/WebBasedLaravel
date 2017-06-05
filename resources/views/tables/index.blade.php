@extends('layouts.app')

@section('content')
	<div class="container">
	<legend>{{ $restaurant->name }}</legend>
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					添加桌位
				</div>
				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Table Form -->
					<form action="/table/store/{{$restaurant -> id}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- table Name -->
						<div class="form-group">
							<label for="table-name" class="col-sm-3 control-label">桌号</label>

							<div class="col-sm-6">
								<input type="text" name="alias_name" id="table-name" class="form-control" value="{{ old('table') }}">
							</div>
						</div>

						<!-- table Description -->
						<div class="form-group">
							<label for="table-description" class="col-sm-3 control-label">桌位人数</label>

							<div class="col-sm-6">
								<input type="text" name="description" id="table-description" class="form-control" value="{{ old('description') }}">
							</div>
						</div>

						<!-- Add table Button -->
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

			<!-- Current table -->
			@if (count($tables) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						删除桌位
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>桌位</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($tables as $table)
									<tr>
										<td class="table-text"><div>{{ $table->alias }}</div></td>
										<td class="table-text"><div>编号{{ $table->id }}</div></td>

										<!-- Table Delete Button -->
										<td>
											<form action="/table/delete/{{ $table->id }}" method="POST">
												{{ csrf_field() }}
												<!-- {{ method_field('DELETE') }} -->

												<button type="submit" id="delete-table-{{ $table->id }}" class="btn btn-default">
													<i class="fa fa-btn fa-trash"></i>删除
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
