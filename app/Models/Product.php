<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    protected $fillable =[
        'category_id',
        'user_id',
        'sku',
        'name',
        'description',
        'cost_price',
        'selling_price',
        'quantity',
        'status',
        'image',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function SaleItems(){
        return $this->hasMany(SaleItem::class);
    }

    public function stockMovements(){
        return $this->hasMany(StockMovement::class);
    }
    public function user(){
        return $this ->belongsTo(User::class);
    }
}
