<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function Product(){
        return $this->hasMany(product::class);
    }
    public function brands(){
        return $this->belongsTo(brands::class);
    }
    public function Cart(){
        return $this->belongsTo(cart::class);
    }
    protected $guarded=[];
}
