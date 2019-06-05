<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table="clients";
	protected $fillable = ['firstname', 'lastname', 'gender', 'date_of_birth', 'email', 'mobile', 'company', 'position', 'type', 'hotline', 'card', 'street', 'city', 'postcode', 'passport_nb', 'issuance_date', 'expiry_date', 'comment'];

	
	public function package()
    {
        return $this->hasMany('App\Package');
    }

}
