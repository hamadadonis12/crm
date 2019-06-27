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


    protected $appends = ['total_packages', 'total_price', 'points_earned', 'full_name'];
	
	public function packages()
    {
        return $this->hasMany('App\Package');
    }
	
	public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }

    public function getTotalPackagesAttribute() 
    {
        return $this->packages->count();
    }

    public function getTotalPriceAttribute()
    {
        $total = $this->packages->sum('price');
        return number_format($total, 0, '.', ',')." $";
    }

    public function getPointsEarnedAttribute()
    {
        $total = $this->packages->sum('price');
        // every 50$ = 1 point
        return floor($total / 50); 
    }

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }

}
