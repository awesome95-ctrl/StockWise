<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable =[
        'invoice_number',
        'user_id',
        'total_amount',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function SaleItems(){
        return $this->hasMany(SaleItem::class);
    }
}
