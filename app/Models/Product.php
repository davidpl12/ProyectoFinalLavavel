<?php

namespace App\Models;

use Dompdf\Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function images()
    {
        try {
            return $this->hasMany(ProductImage::class);
        } catch (Exception $e) {
        }
    }


    public function getFeaturedImageUrlAttribute()
    {
        try {
            $featuredImage = $this->images()->where('featured', true)->first();
            if (!$featuredImage) {
                $featuredImage = $this->images()->first();
            }

            if ($featuredImage) {
                return $featuredImage->url;
            }

            return '/images/products/default.jpg';
        } catch (Exception $e) {
        }
    }
}
