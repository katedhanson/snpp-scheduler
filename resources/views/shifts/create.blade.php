@extends('layouts.app')

@section('title')
New shift
@stop

@section('styles')
<link rel="stylesheet" href="/css/interior.css" type="text/css" />
@stop

@section('scripts')
@stop


@section('content')
<h1>Create a new shift</h1>
<div class='island'>
  {!! Form::open(array('action' => 'Shifts\ShiftsController@store')) !!}
  <div class='form-group'>
    {!! Form::label('manager_id', 'Manager:') !!}
    {!! Form::select('manager_id', $managers, '', ['class' => 'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('employee_id', 'Employee:') !!}
    {!! Form::select('employee_id', $employees, '', ['class' => 'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('start_time', 'Start date and time:') !!}
    {!! Form::input('datetime-local', 'start_time', '', ['class' => 'date-time form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('end_time', 'End date and time:') !!}
    {!! Form::input('datetime-local', 'end_time', '', ['class' => 'date-time form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('break', 'Break duration (in minutes):') !!}
    {!! Form::text('break', '', ['class' => 'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::submit('Create shift', ['class' => 'btn btn-default form-control']) !!}
  </div>

  {!! Form::close() !!}
</div>

@stop
