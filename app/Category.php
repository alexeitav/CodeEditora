<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function setNameAttribute($value)
    {

        $value = strtolower($value);
        $this->attributes['name'] = ucwords($value);

    }

}
