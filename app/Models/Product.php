<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function Category(){
        return $this->hasMany(Category::class,'id','category_id');
    }
    public function Brand(){
        return $this->hasMany(Brand::class,'id','brand_id');
    }
    public function cart(){
        return $this->belongsTo(cart::class);
    }
}
