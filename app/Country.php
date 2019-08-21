<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $table = 'countries';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
        'continent',
        'surface_area',
        'population',
        'life_expectancy',
        'gnp',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'country_code', 'code');
    }

    public function packages()
    {
        return $this->hasMany('App\Package');
    }
}
