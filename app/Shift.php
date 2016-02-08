<?php

namespace App;

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

    public function setEmployeeIdAttribute($employee_id)
    {
      if ($employee_id == 0) {
        unset($this->attributes['employee_id']);
      }
    }

    public function setStartTimeAttribute($date)
    {
      $this->attributes['start_time'] = Carbon::createfromformat('U', strtotime($date));
    }

    public function setEndTimeAttribute($date)
    {
      $this->attributes['end_time'] = Carbon::createfromformat('U', strtotime($date));
    }
}
