<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillabale = [
        'image_path'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
