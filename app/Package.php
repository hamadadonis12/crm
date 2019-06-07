<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table="packages";
	protected $fillable = [
		'client_id', 
		'name', 
		'from', 
		'to',
		'has_hotel',
		'hotel_name',
		'has_flight_ticket',
		'ticket_number',
		'has_visa',
		'visa_name',
		'has_insurance',
		'has_tours',
		'has_cruise',
		'cruise_name',
		'has_train',
	];
	
	
	
	public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
