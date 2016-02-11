<?php

namespace Scheduler\Domain\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'username', 'name', 'email', 'password', 'role', 'phone', 'color'
  ];

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * We often need the users who have a role of 'manager', so here's a
  * little query scope to do that
  */
  public function scopeIsManager($query)
  {
    $query->where('role', 'manager');
  }

  /**
  * We often need the users who have a role of 'employee', so here's a
  * little query scope to do that
  */
  public function scopeIsEmployee($query)
  {
    $query->where('role', 'employee');
  }
}
