<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function language()
    {
        return $this->belongsToMany('App\Language');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
