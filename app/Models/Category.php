<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Products;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['title', 'parent'];

    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent')->with('categories');
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }

}