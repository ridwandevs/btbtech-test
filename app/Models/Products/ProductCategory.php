<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'catgeory_image'
    ];

    protected $casts = [
        'catgeory_image' => 'array'

    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
