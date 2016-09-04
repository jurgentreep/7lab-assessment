<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPriceAttribute($price)
    {
        return number_format($price / 100, 2, ',', '');
    }

    public function setPriceAttribute($price)
    {
        return $this->attributes['price'] = (int)str_replace(',', '', $price);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'price', 'stock'
    ];
}
