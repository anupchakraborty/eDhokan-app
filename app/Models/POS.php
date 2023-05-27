<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POS extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id', 
        'customer_id', 
        'product_id', 
        'quantity', 
        'unit_price', 
        'sub_total',
        'status'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
