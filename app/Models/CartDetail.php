<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    	// CartDetail N               1 Product
        public function product()
        {
            return $this->belongsTo(Product::class);
        }
}
