<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $table='slider';
    protected $primary_key='id';
    protected $fillable=[
        "title", "description", "image", "slug", "active",
    ];
}
