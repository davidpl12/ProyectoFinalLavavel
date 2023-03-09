<?php

namespace App\Models;

use Dompdf\Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
        use HasFactory;

        public function product()
        {
            try {
                return $this->belongsTo(Product::class);
            } catch (Exception $e) {

            }
        }

        public function getUrlAttribute() {

            try {
                if(substr($this->image, 0, 4) == "http") {
                    return $this->image;
                }
                return '/images/products/' . $this->image;
            } catch (Exception $e) {

                }

        }

}
