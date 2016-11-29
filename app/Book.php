<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'user_id'

    ];

    public function setTitleAttribute($value)
    {

        $value = strtolower($value);
        $this->attributes['title'] = ucwords($value);

    }

    public function setSubTitleAttribute($value)
    {

        $value = strtolower($value);
        $this->attributes['subtitle'] = ucwords($value);

    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
