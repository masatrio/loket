<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\Ticket;

class EventController extends Controller
{
  private $rules = [
      'name' => 'required|unique:event',
      'type' => 'required',
      'date_start' => 'required',
      'date_end' => 'required',
      'location_id' => 'required'
  ];

  public function create(Request $request)
  {
      $this->validate($request, $this->rules);
      // check if the location_id exist on database
      $location = Location::find($request->json('location_id'));
      if(!$location)
            return response()->json(['error' => 'location_id not found'], 404);
      //create events
      $event   = $location->events()->create([
        'name' => $request->json('name'),
        'type' => $request->json('type'),
        'date_start' => $request->json('date_start'),
        'date_end' => $request->json('date_end')
      ]);
      return $event;
  }

  public function show()
  {
      //get all events
      $events = Event::all();
      $length = sizeof($events);
      $tickets = [];
      // retrieve ticket and location data of each ticket
      for($i=0; $i<$length; $i++){
        $events[$i]['tickets'] = $events[$i]->tickets;
        $events[$i]['location'] = $events[$i]->location;
      }
      return $events;
  }
}
