@extends('layouts.app')

@section('title')
New employee
@stop

@section('styles')
<link rel="stylesheet" href="/css/interior.css" type="text/css" />
@stop

@section('scripts')
@stop


@section('content')
<h1>Create a new employee</h1>
<div class='island'>
  {!! Form::open(array('action' => 'Users\UsersController@store')) !!}
  <div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', '', ['class' => 'form-control']) !!}
  </div>

  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
    <label class="control-label">Role</label>
    <select type="select" class="form-control" name="role" value="{{ old('role') }}">
      <option value="manager">Manager</option>
      <option value="employee">Employee</option>
    </select>

    @if ($errors->has('role'))
    <span class="help-block">
      <strong>{{ $errors->first('role') }}</strong>
    </span>
    @endif
  </div>

  <div class='form-group'>
    {!! Form::label('email', 'Email:') !!}
    {!! Form::input('email', 'email', '', ['class' => 'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', '', ['class' => 'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('color', 'Color:') !!}
    {!! Form::input('color', 'color', '', ['class' => 'form-control']) !!}
  </div>

  <div class='create-new'>
    <div class='form-group'>
      {!! Form::label('username', 'Username:') !!}
      {!! Form::text('username', '', ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
      {!! Form::label('password', 'Password:') !!}
      {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
      {!! Form::label('confirm_password', 'Confirm password:') !!}
      {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class='form-group'>
    {!! Form::submit('Create employee', ['class' => 'btn btn-default form-control']) !!}
  </div>

  {!! Form::close() !!}
</div>

@stop
