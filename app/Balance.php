<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $guarded = ['id'];

    public function faculty()
    {
    	return $this->belongsTo(Faculty::class);
    }
    public function getYearAttribute($value)
    {
    	$date = explode('-', $this->attributes['year']);
        return $date[0];
    }
}
