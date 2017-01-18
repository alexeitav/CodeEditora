<?php

namespace CodeEduBook\Models;

use Bootstrapper\Interfaces\TableInterface;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model implements TableInterface
{
    use FormAccessible;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'author_id'

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

    public function author()
    {
        return $this->belongsTo('CodePub\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('CodeEduBook\Models\Category')->withTrashed();
    }

    public function formCategoriesAttribute()
    {

        return $this->categories->pluck('id')->all();
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
