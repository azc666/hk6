<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;

class Category extends Model
{
    protected $fillable = [
        'cat_name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
