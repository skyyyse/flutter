<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_image extends Model
{
    use HasFactory;
    protected $table = 'products_image';
    protected $primary_key = 'id';
    protected $fillable = [
        "image", "sort_order", "products_id",
    ];
}
