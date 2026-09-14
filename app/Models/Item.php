<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'category_id',
        'image',
        'stock',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
