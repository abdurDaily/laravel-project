<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // :::::::::: SUBCATEGORY :::::::::::
    public function subcategory() {
        return $this->hasMany(SubCategory::class,'');
    }
}
