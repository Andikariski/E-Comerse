<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name_produk', 'category_id', 'price', 'stok'];

    public function category()
    {
        #belongsTo gunanya untuk produk memiliki 1 kategory, kategory memiliki banyak product
        return $this->belongsTo('App\Category');
    }
}
