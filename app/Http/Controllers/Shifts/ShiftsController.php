<?php

namespace Scheduler\Http\Controllers\Shifts;

use Scheduler\Http\Requests;
use Scheduler\Http\Controllers\Controller;
use \Scheduler\Domain\User\User;
use \Scheduler\Domain\Shift\Shift;
use Illuminate\Http\Request;
use Auth;
use File;
use Response;

class ShiftsController extends Controller
{

  /**
  * Every route through this controller should be authenticated
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Load the calendar
  *
  */
  public function index() {
    // every time we load the schedule, we update the events xml
    $shifts = Shift::all();
    File::put('events.xml', $this->getScheduleXml($shifts));
    //return $shifts;
    return view('shifts/schedule');
  }

  /**
  * Display a form to create a new shift
  */
  public function create() {
    // get an array of manager options
    $managers = User::oldest('name')->isManager()->lists('name', 'id')->toArray();

    // get an array of employee options
    $employees = User::oldest('name')->isEmployee()->lists('name', 'id')->toArray();
    $employees = [0 => 'Open shift'] + $employees;

    return view('shifts/create', compact('managers', 'employees'));
  }

  /**
  * Display a form to edit an existing shift
  * @todo make this page
  */
  public function edit() {
    return view('shifts/edit');
  }

  /**
  * Display an employee's time card
  * @todo make this page
  */
  public function timecard() {
    return view('shifts/timecard');
  }

  /**
  * Process a post request, creating a new shift
  */
  public function store(Request $request) {
    $input = $request->all();
    Shift::create($input);

    // after we create the shift, go to the schedule
    return redirect('schedule');
  }

  /**
  * Given an array of shifts, return xml formatted the way the monthly.js plugin
  * needs it
  *
  * @var array $shifts
  * @return formatetd xml
  *
  * @todo this bit of business logic really probably ought to go elsewhere, but
  * I don't understand laravel 5 well enough yet to know exactly where
  */
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
