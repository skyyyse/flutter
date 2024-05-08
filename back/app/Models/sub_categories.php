<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class sub_categories extends Model
{
    use HasFactory;
    protected $table='sub_categories';
    protected $primary_key='id';
    protected $fillable=[
        'name',
        'slug',
        'status',
        'categories_id',
    ];
}
