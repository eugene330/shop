<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['rate'];

    public function product()
    {
        return $this->hasMany(Product::class, 'original_currency', 'code');
    }

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    public function isMain()
    {
        return $this->is_main === 1;
    }
}
