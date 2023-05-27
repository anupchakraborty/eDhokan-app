<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id', 
        'product_id', 
        'quantity', 
        'status'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function products()
    {
        return $this->hasmany('App\Models\Product');
    }
}