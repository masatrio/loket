***********************************************************
Route::post('/location/create', 'LocationController@create');

Example json body :
{
"name" : "Gedung Kemerdekaan",
	"address": "Jl. Pandanaran",
 "city" : "Bandung"
}
***********************************************************
  
***********************************************************
Route::post('/event/create', 'EventController@create');
  
Example json body :
{
"name" : "Musik Jaz",
	"type" : "musik",
 "date_start" : "2018-07-08 06:00:00",
	"date_end" : "2018-07-08 08:00:00",
 "location_id" : 1
}
***********************************************************

***********************************************************
Route::post('/event/ticket/create', 'TicketController@create');
  
Example json body :
{
"price" : 200000,
 "quota" : 200,
 "type"  : "VIP",
 "event_id" : 3
}
***********************************************************

***********************************************************
Route::get('/event/get_info', 'EventController@show');
***********************************************************

***********************************************************
Route::post('/transaction/purchase', 'TransactionController@create');
Example json body :
{
"user_id" : 1,
	"data"    : [
	{ "ticket_id" : 1, "qty" : 2 },
	{ "ticket_id" : 3, "qty" : 5 }
	]
}
***********************************************************

