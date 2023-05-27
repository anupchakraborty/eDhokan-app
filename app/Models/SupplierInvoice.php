<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name', 
        'email', 
        'phone', 
        'address', 
        'product_id', 
        'quantity', 
        'status'
    ];
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
    public function products()
    {
        return $this->hasmany('App\Models\Product');
    }
}
