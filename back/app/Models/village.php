<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    use HasFactory;
    protected $table='village';
    protected $primary_key='id';
    protected $fillable=['village_khmer','village_english'];
}
