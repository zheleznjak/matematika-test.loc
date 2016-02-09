<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function city()
    {
        return $this->belongsToMany('App\City');
    }
    public function country()
    {
        return $this->hasManyThrough('App\Country', 'App\City');
    }
}
