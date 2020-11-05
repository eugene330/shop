<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes, Translatable;

    protected $fillable = ['name', 'name_in'];

    public function propertyOptions()
    {
        return $this->hasMany(PropertyOption::class);
    }

    //TODO Check table name and fields
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
