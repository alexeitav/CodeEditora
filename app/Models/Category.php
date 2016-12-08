<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{
    protected $fillable = [
        'name'
    ];

    public function setNameAttribute($value)
    {

        $value = strtolower($value);
        $this->attributes['name'] = ucwords($value);

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
