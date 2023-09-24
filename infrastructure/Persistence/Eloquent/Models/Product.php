<?php

namespace Infrastructure\Persistence\Eloquent\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'description'
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
