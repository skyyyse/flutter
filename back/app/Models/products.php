<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primary_key='id';
    protected $fillable=[
    'id',
    'title',
    'slug',
    'description',
    'price',
    'compare_price',
    'categories_id',
    'sub_categories_id',
    'brands_id',
    'is_featured',
    'aku',
    'barcode',
    'track_qty',
    'qty',
    'status',
    ];
    public function products_image()
    {
        return $this->hasMany(products_image::class);
    }
}
