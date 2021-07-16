<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos.
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //Relacion muchos a muchos.
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    //Relacion entre categorias y productos a travez de subcategoria.
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    //URL amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}