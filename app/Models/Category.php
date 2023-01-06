<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function Subcategory()
    {
     return $this->hasMany(Subcategory::class);
    }

    public function Brand()
    {
     return $this->hasMany(brand::class);
    }
    public function Color()
    {
     return $this->hasMany(color::class);
    }
    public function Size()
    {
     return $this->hasMany(size::class);
    }
}
