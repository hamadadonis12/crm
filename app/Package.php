<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
		'price',
		'country_code',
		'city_id'
	];
	
	protected $appends = ['country_name'];
	
	
	public function client()
    {
        return $this->belongsTo('App\Client');
    }
	
	public function getCountryNameAttribute() 
    {
        return $this->packages['country_code'];
	}
	
	/**
     * Country relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
	}
	
	/**
     * Country relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}
