<?php

namespace App\Models;

use Dompdf\Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products(){
        try {
            return $this->hasMany(Product::class);
        } catch (Exception $e) {

        }
    }

}
