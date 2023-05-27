<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name', 
        'email', 
        'phone', 
        'address', 
        'regi_no', 
        'status'
    ];
    public function invoices()
    {
        return $this->hasMany('App\Models\SupplierInvoice');
    }
}
