<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;
    protected $table='district';
    protected $primary_key='id';
    protected $fillable=['district_khmer','district_english'];
}
