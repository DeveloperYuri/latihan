<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageSlugModel extends Model
{
    use HasFactory;

    protected $table = 'product_image_slug';

    protected $fillable = [
        'image',
        'name',
        'description',
        'slug'
    ];
}
