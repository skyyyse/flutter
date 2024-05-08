<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
    use HasFactory;

    protected $table='commune';
    protected $primary_key='id';
    protected $fillable=['commune_khmer','commune_english'];
}
