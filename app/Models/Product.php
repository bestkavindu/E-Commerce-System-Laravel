<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    //
    protected $fillable = [
        "category_id",
        "brand_id",
        "name",
        "slug",
        "image",
        "description",
        "price",
        "stock",
        "is_active",
        "is_featured",
        "is_stock",
        "is_sale",
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
