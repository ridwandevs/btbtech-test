<?php

namespace App\Models\Products;

use App\Models\Order\CartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'product_category_id'
    ];
    
    protected $fillable = [
        'product_title',
        'slug',
        'product_description',
        'produrct_price',
        'product_stock'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function cart()
    {
        return $this->hasMany(CartItem::class);
    }
}
