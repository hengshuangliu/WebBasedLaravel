@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Table for {{ $restaurant->name }}
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Table Form -->
					<form action="/table/store/{{$restaurant -> id}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- table Name -->
						<div class="form-group">
							<label for="table-name" class="col-sm-3 control-label">Table</label>

							<div class="col-sm-6">
								<input type="text" name="alias_name" id="table-name" class="form-control" value="{{ old('table') }}">
							</div>
						</div>

						<!-- table Description -->
						<div class="form-group">
							<label for="table-description" class="col-sm-3 control-label">Description</label>

							<div class="col-sm-6">
								<input type="text" name="description" id="table-description" class="form-control" value="{{ old('description') }}">
							</div>
						</div>

						<!-- Add table Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Table
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
						Current Tables
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Table</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($tables as $table)
									<tr>
										<td class="table-text"><div>{{ $table->alias }}</div></td>

										<!-- Table Delete Button -->
										<td>
											<form action="/table/delete/{{ $table->id }}" method="POST">
												{{ csrf_field() }}
												<!-- {{ method_field('DELETE') }} -->

												<button type="submit" id="delete-table-{{ $table->id }}" class="btn btn-danger">
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
