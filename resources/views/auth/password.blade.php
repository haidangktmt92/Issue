@extends('layouts.app')
@section('content')
	<div class="container">
		<form method="POST" action="/password/email">
            {{ csrf_field()}}
            @include('common.errors')
            <table>
            	<tr>
            		<td>
            			Send password reset link
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
                    Send password reset link
                </button>
            		</td>
            	</tr>
            </table>			               
        </forn>
	</div>
@stop