<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
  private $rules = [
      'name' => 'required|unique:location',
      'address' => 'required',
      'city' => 'required'
  ];

  public function create(Request $request)
  {
      $this->validate($request, $this->rules);

      $location = Location::create([
          'name'  => $request->json('name'),
          'address' => $request->json('address'),
          'city'  => $request->json('city')
      ]);

      return $location;
  }
}
