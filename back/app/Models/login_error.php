<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_error extends Model
{
    use HasFactory;
    protected $table="login_error";
    protected $primary_key="id";
    protected $fillable = ["email"] ;
    public $timestamps = false;
}
