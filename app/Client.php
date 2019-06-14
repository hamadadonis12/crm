<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Client extends Model implements HasMedia
{
    use HasMediaTrait;
	
    protected $table="clients";
	protected $fillable = ['firstname', 'lastname', 'gender', 'date_of_birth', 'email', 'mobile', 'company', 'position', 'type', 'hotline', 'card', 'street', 'city', 'postcode', 'passport_nb', 'issuance_date', 'expiry_date', 'comment'];

	
	public function package()
    {
        return $this->hasMany('App\Package');
    }
	
	public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }

}
