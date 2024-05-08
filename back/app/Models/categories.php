<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
        use HasFactory;
        protected $table = "categories";
        protected $primaryKey = "id"; // Corrected property name
        protected $fillable = ['name', 'slug', 'image', 'status']; // Corrected property name

        public function sub_categories()
        {
            return $this->hasMany(sub_categories::class);
        }
}
