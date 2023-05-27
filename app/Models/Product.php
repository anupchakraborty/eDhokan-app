<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 
        'category', 
        'distributor', 
        'sell_price', 
        'buy_price', 
        'quantity',
        'product_size',
        'product_weight',
        'product_image', 
        'status'
    ];
    public function invoice()
    {
        return $this->belongsTo('App\Models\SupplierInvoice');
    }
}
