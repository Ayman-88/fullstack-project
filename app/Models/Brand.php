<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(product::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function cart()
    {
        return $this->belongsTo(cart::class);
    }

    protected $guarded = [];
}
