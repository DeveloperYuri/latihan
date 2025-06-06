<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSlugModel extends Model
{
    use HasFactory;

    protected $table = 'product_slug';

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
