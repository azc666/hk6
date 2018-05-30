<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;

class Product extends Model
{
    protected $fillable = [
        'imagePath',
        'prod_name',
        'prod_layout',
        'description',
        'price'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('id', 'category_id', 'product_id');
    }
}
