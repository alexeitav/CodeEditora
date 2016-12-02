<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements TableInterface
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


    public function getTableHeaders()
    {

        return ['ID', 'Nome'];

    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
        }

    }


}
