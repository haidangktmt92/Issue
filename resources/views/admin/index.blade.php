@extends('layouts.app')
@section('content')
	
	<div class="panel-body">
		@include('common.errors')

		<form action="/admin/template" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<div class="form-group">
                <label class="col-sm-1 control-label col-sm-offset-1">User:</label>
                <select name="user" class="form-control" style="width: 200px; margin-left: 240px;">
                    <option></option>
                    <?php $opt = DB::table('users')->select('id', 'name')->get();?>
                    @foreach($opt as $r)
                    	
                        <option value="{{$r->id}}">{{$r->name}}</option>
                      
                    @endforeach
                </select>
            </div>
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
		
		@if(count($users)>0)
			@foreach ($users as $user)
				

				<div class="form-horizontal">
					<label class="col-sm-offset-2">{{ $user->name }}</label>
					<? {{ $i=0 }} ?>
					@if(count($templates)>0)
						
						@foreach ($templates as $template)
							@if($user->id == $template->user_id)
							 <? {{ $i++ }} ?>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-2">
										<input type="text" name="name" value="{{ $template->name }}"  class="form-control" >
									</div>
									<div class="col-sm-4">
										<input type="text" name="description" value="{{ $template->description }}"  class="form-control" >
									</div>
									
									<div class="col-sm-2">
					                     <form action="/admin/template/{{ $template->id }}" method="POST">
								            {{ csrf_field() }}
								            {{ method_field('DELETE') }}

								            <button type="submit" class="btn btn-danger" > Delete </button>
								        </form>
					                </div>
								</div>					
							@endif
							
						@endforeach														
					@endif
					@if ($i==0)
						<div class="form-group">
							<div class="alert alert-warning col-sm-6 col-sm-offset-2">
				                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				                No record found
				            </div>
						</div>							
					@endif
				</div>
				
				
			@endforeach
		@endif
	</div>

@stop