<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table="packages";
	protected $fillable = ['client_id', 'name', 'from', 'to'];
	
	
	
	public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
