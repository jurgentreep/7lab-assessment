<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Format the price to a comma seperated Format
     * @param  integer $price
     * @return string
     */
    public function getPriceAttribute($price)
    {
        return number_format($price / 100, 2, ',', '');
    }

    /**
     * Convert string to integer which represents the amount of cents
     * @param string $price
     */
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
