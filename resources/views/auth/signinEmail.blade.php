@extends('layouts.app')
@section('content')
	<div class="container">
		<form method="POST" action="/signin/email">
            {{ csrf_field()}}
            @include('common.errors')
            <table>
            	<tr>
            		<td>
            			Send sign in link
            		</td>
            	</tr>
            	<tr>
            		<td>
            			Enter your email:
            		</td>
            		<td>
            			<input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
            		</td>
            	</tr>
            	<tr>
            		<td>
            			<button type="submit" class="btn btn-primary">
                    Send sign in link
                </button>
            		</td>
            	</tr>
            </table>			               
        </forn>
	</div>
@stop