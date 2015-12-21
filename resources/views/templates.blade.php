@extends('layouts.app')
@section('content')
	
	<div class="panel-body">
		@include('common.errors')

		<form action="/template" method="POST" class="form-horizontal">
			{{ csrf_field() }}

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-2">
					<input type="text" name="name" placeholder="Name" class="form-control" >
				</div>
				<div class="col-sm-4">
					<input type="text" name="description" placeholder="Description" class="form-control" >
				</div>
				<div class="col-sm-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Template
                    </button>
                </div>
			</div>
			
		</form>
		@if (count($templates)>0)
			@foreach ($templates as $template)
				<div class="form-horizontal">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<input type="text" name="name" value="{{ $template->name }}" disabled class="form-control" >
						</div>
						<div class="col-sm-4">
							<input type="text" name="description" value="{{ $template->description }}" disabled class="form-control" >
						</div>
						<div class="col-sm-2">
		                     <form action="/template/{{ $template->id }}" method="POST">
					            {{ csrf_field() }}
					            {{ method_field('DELETE') }}

					            <button type="submit" class="btn btn-danger" > Delete </button>
					        </form>
		                </div>
					</div>
				</div>

			@endforeach

		@endif
	</div>

@stop