<?php

namespace App\Models\Product;

use App\Models\Defaults\DefaultModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Товары
 */
class Product extends DefaultModel
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'categories_id',
        'in_stock',
        'rating',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    /**
     * Категория
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'categories_id');
    }
}
