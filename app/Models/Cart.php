<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');
    }
    public function Product()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function brand()
    {
        return $this->hasMany(Brand::class,'id','brand_id');
    }
    public function category()
    {
        return $this->hasMany(category::class,'id','category_id');
    }
    protected $guarded = [];
}
