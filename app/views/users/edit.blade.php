@extends ('layout.default')
@section ('content')
    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT' ,'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{Form::label('name', 'Name', array('class' => 'awesome'));}}
        {{Form::text('name',Input::old('name'),array('class' => 'form-control'))}}
        {{$errors->first('name')}}
    </div>
     <div class="form-group">
        {{Form::label('street_address', 'Street Address', array('class' => 'awesome'));}}
        {{Form::text('street_address',Input::old('street_address'),array('class' => 'form-control'));}}
    </div>
    <div class="form-group">
        {{Form::label('city', 'City', array('class' => 'awesome'));}}
        {{Form::text('city',Input::old('city'),array('class' => 'form-control'));}}
    </div>
    <div class="form-group">
        {{Form::label('state', 'State', array('class' => 'awesome'));}}
        {{Form::text('state',Input::old('state'),array('class' => 'form-control'));}}
    </div>
    <div class="form-group">
        {{Form::label('zip_code', 'Zip Code', array('class' => 'awesome'));}}
        {{Form::text('zip_code',Input::old('zip_code'),array('class' => 'form-control'));}}
    </div>
    <div class="form-group">
        {{Form::label('country', 'Country', array('class' => 'awesome'));}}
        {{Form::text('country',Input::old('country'),array('class' => 'form-control'));}}
    </div>
    <div class="form-group">
        {{Form::label('mobile_phone', 'Mobile Number', array('class' => 'awesome'));}}
        {{Form::text('mobile_phone',Input::old('mobile_phone'),array('class' => 'form-control'));}}
    </div>
    <div class="form-group">
        {{Form::submit('Update',array('class' => 'btn btn-success btn-block'))}}
    </div>
    {{ Form::close() }}
@stop
