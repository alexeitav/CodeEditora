<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TableInterface
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];

    public function setNameAttribute($value)
    {

        $value = strtolower($value);
        $this->attributes['name'] = ucwords($value);

    }

    public function books()
    {
        return $this->belongsToMany('CodePub\Models\Book');
    }

    public function getNameTrashedAttribute()
    {
        return $this->trashed() ? "{$this->name} (inativa)" : $this->name;
        //cria um "field" name_trashed que segue essa regra de apresentaçao
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
