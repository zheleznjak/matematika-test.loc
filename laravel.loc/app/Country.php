<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function city()
    {
        return $this->hasMany('App\City');
    }
    public function language()
    {
        return $this->hasManyThrough('App\Language', 'App\City');
    }
}