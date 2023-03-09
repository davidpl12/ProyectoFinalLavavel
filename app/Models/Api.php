<?php

namespace App\Models;

use App\Http\Controllers\APIProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Api extends Model
{
    use HasFactory;
}

Route::apiResource('product', APIProductController::class);
