<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
class Product extends Model
{
    use HasFactory;

    /**
     * Hasmany Relationship with reviews
     */
    public function reviews(){
        return $this->hasMany(Review::class, 'product_id');
    }
    
}
