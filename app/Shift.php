<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
