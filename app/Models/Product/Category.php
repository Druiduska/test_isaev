<?php

namespace App\Models\Product;

use App\Models\Defaults\DefaultModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Категория
 */
class Category extends \Illuminate\Database\Eloquent\Model //DefaultModel
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name'];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

}
