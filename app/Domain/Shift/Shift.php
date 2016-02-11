<?php

namespace Scheduler\Domain\Shift;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'manager_id', 'employee_id', 'break', 'start_time', 'end_time'
  ];

  /**
  * The attributes that are dates
  *
  * @var array
  */
  protected $dates = [
    'start_time', 'end_time'
  ];

  /**
  * Set the employee for the shift
  *
  * We are overwriting this function because an open shift has an id of 0,
  * but we don't want the employee id set to 0
  *
  * @var employee_id
  */
  public function setEmployeeIdAttribute($employee_id)
  {
    if ($employee_id > 0) {
      $this->attributes['employee_id'] = $employee_id;
    }
  }

  /**
  * Set the start date and time for the shift
  *
  * We are overwriting this function because we need a date object, not a string
  *
  * @var $date
  */
  public function setStartTimeAttribute($date)
  {
    $this->attributes['start_time'] = Carbon::createfromformat('U', strtotime($date));
  }

  /**
  * Set the end date and time for the shift
  *
  * We are overwriting this function because we need a date object, not a string
  *
  * @var $date
  */
  public function setEndTimeAttribute($date)
  {
    $this->attributes['end_time'] = Carbon::createfromformat('U', strtotime($date));
  }
}
