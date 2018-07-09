<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private $rules = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
    ];

    public function show(Request $request)
    {
        $user = User::all();
        return $user;
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $user = User::create([
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'password' => bcrypt($request->json('password'))
        ]);

        return $user;
    }

    public function update(Request $request)
    {
        $id         = $request->json('id');
        $getUser    = User::find($id);
        $getUser->name      = $request->json('name');
        $getUser->password  = bcrypt($request->json('password'));
        $getUser->save();

        return $getUser;
    }

    public function destroy(Request $request)
    {
        $id = $request->json('id');
        $getUser = User::find($id);

        $getUser->delete();

        return response()->json(['success' => 'Data Deleted'], 200);
    }
}
