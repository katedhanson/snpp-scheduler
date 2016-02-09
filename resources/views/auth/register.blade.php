@extends('layouts.app')

@section('title')
Register new user
@stop

@section('styles')
<link rel="stylesheet" href="/css/exterior.css" type="text/css" />
@stop

@section('content')
<div class="island">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {!! csrf_field() !!}

    <!-- Name -->
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label class="control-label">Name</label>
      <input type="text" class="form-control" name="name" value="{{ old('name') }}">

      @if ($errors->has('name'))
      <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
      @endif
    </div>

    <!-- Role -->
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

    <!-- Phone -->
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
      <label class="control-label">Phone</label>
      <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

      @if ($errors->has('phone'))
      <span class="help-block">
        <strong>{{ $errors->first('phone') }}</strong>
      </span>
      @endif
    </div>

    <!-- Email -->
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label class="control-label">Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">

      @if ($errors->has('email'))
      <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>

    <!-- Color -->
    <div class='form-group'>
      {!! Form::label('color', 'Shift color:') !!}
      {!! Form::input('color', 'color', '', ['class' => 'form-control']) !!}
    </div>

    <!-- Username -->
    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
      <label class="control-label">Username</label>
      <input type="text" class="form-control" name="username" value="{{ old('username') }}">

      @if ($errors->has('username'))
      <span class="help-block">
        <strong>{{ $errors->first('username') }}</strong>
      </span>
      @endif
    </div>

    <!-- Password -->
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label class="control-label">Password</label>
      <input type="password" class="form-control" name="password">

      @if ($errors->has('password'))
      <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>

    <!-- Confirm password -->
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <label class="control-label">Confirm password</label>
      <input type="password" class="form-control" name="password_confirmation">

      @if ($errors->has('password_confirmation'))
      <span class="help-block">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">
        Register
      </button>
    </div>
  </div>
</form>
</div>
@endsection
