<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Ticket;

class TicketController extends Controller
{
    private $rules = [
        'price' => 'required',
        'quota' => 'required',
        'type' => 'required',
        'event_id' => 'required'
    ];

    public function create(Request $request)
    {
        $this->validate($request, $this->rules);
        // check if event_id exist on database
        $event = Event::find($request->json('event_id'));
        if(!$event)
            return response()->json(['error' => 'event_id not found'], 404);

        // check if ticket with event_id and type already exist on database
        $ticketValidation = Ticket::where('type', $request->json('type'))
                            ->where('event_id', $request->json('event_id'))
                            ->count();
        if($ticketValidation > 0) {
            return response()->json(['error' => 'ticket with event_id and type has already been created'], 404);
        }
        //create events
        $ticket   = $event->tickets()->create([
          'price' => $request->json('price'),
          'quota' => $request->json('quota'),
          'type' => $request->json('type')
        ]);
        return $ticket;
    }
}
