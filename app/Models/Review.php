<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

     /**
     * belongsTo Relationship with products
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
