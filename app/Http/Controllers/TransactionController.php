<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;

class TransactionController extends Controller
{
    private $rules = [
        'data' => 'required',
        'user_id' => 'required'
    ];

    public function create(Request $request)
    {
        $this->validate($request, $this->rules);
        // check if event_id exist on database
        $user = User::find($request->json('user_id'));
        if(!$user)
            return response()->json(['error' => 'user_id not found'], 404);
        $trasanction = [];
        // loop transaction data base on ticket_id
        foreach ($request->json('data') as $data) {
            // check if the ticket_id exist on database
            $check          = Ticket::where('id', $data['ticket_id'])
                            ->count();
            if($check == 0){
                continue;
            }
            $trasanction[]  = $user->transactions()->create([
              'ticket_id'   => $data['ticket_id'],
              'qty'         => $data['qty']
            ]);
        }
        return $trasanction;
    }
    public function show()
    {
        $transaction = User::all();
        for($i=0; $i<sizeof($transaction); $i++){
            $transaction[$i]['transations'] = $transaction[$i]->transactions;
        }
        return $transaction;
    }
}
