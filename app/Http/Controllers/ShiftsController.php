<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\User;
use \App\Shift;
use Illuminate\Http\Request;
use Auth;
use File;
use Response;

class ShiftsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function index() {
    // every time we load the schedule, we update the events xml
    $shifts = Shift::all();
    File::put('events.xml', $this->getScheduleXml($shifts));
    //return $shifts;
    return view('shifts/schedule');
  }

  public function create() {
    // get an array of manager options
    $managers = User::oldest('name')->isManager()->lists('name', 'id')->toArray();

    // get an array of employee options
    $employees = User::oldest('name')->isEmployee()->lists('name', 'id')->toArray();
    $employees = [0 => 'Open shift'] + $employees;

    return view('shifts/create', compact('managers', 'employees'));
  }

  public function edit() {
    return view('shifts/edit');
  }

  public function timecard() {
    return view('shifts/timecard');
  }

  public function store(Request $request) {
    $input = $request->all();
    Shift::create($input);
    return redirect('schedule');
  }

  protected function getScheduleXml($shifts) {
    $scheduleXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><monthly/>');
    foreach ($shifts as $shift) {
      // get the employee who is scheduled for this shift
      $employee = User::find($shift->employee_id);
      $name = ($employee) ? $employee->name : "Open shift";
      $color = ($employee) ? $employee->color : "grey";
      $url = ($employee) ? "/contact/".$employee->id : "";

      $shiftXml = $scheduleXml->addChild('event');
      $shiftXml->addChild('id', $shift->id);
      $shiftXml->addChild('name', $name);
      $shiftXml->addChild('startdate', $shift->start_time->format("Y-m-d"));
      $shiftXml->addChild('enddate', $shift->end_time->format("Y-m-d"));
      $shiftXml->addChild('starttime', $shift->start_time->format("H:i"));
      $shiftXml->addChild('endtime', $shift->end_time->format("H:i"));
      $shiftXml->addChild('color', $color);
      $shiftXml->addChild('url', $url);

    }
    return $scheduleXml->asXML();
  }
}
