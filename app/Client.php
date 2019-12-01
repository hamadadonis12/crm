<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Client extends Model implements HasMedia
{
    use HasMediaTrait, Notifiable;
	
    protected $table="clients";
	protected $fillable = ['fullname', 'gender', 'date_of_birth', 'email', 'mobile', 'company', 'website', 'position', 'type', 'hotline', 'miles', 'country', 'city', 'postcode', 'passport_nb', 'issuance_date', 'expiry_date', 'comment'];


    protected $appends = ['total_packages', 'total_price', 'points_earned', 'loyalty_card_id', 'slug'];
	
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

   /* public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }*/

    public function getLoyaltyCardIdAttribute()
    {
        if(!$this->id)
            return null;

        $prefix = 110219;

        if($this->id < 10)
            $suffix = '0000';
        elseif ($this->id >= 10 && $this->id < 100)
            $suffix = '000';
        elseif ($this->id >= 100 && $this->id < 1000)
            $suffix = '00';
        elseif ($this->id >= 1000 && $this->id < 10000)
            $suffix = '0';
        else
            $suffix = '';

        return $prefix.$suffix.$this->id;
    }

    /**
     * Slug Attribute
     * @return [type] [description]
     */
    public function getSlugAttribute()
    {
        return str_slug($this->fullname);
    }

}
