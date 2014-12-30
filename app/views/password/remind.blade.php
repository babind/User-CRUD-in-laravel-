@if(Session::has('error'))
{{trans(Session::get('reason'))	}}
@elseif(Session::has('success'))
An email with the password reset has been sent.
@endif
{{Form::open(array('route'=>'password.request'))}}

<div class="col-md-6">
{{Form::label('email','Email:')	}}
{{Form::text('email')}}
</div>
{{Form::submit('Submit')	}}
{{Form::close()}}