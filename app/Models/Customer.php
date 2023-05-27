<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'phone', 
        'password', 
        'date_of_birth',
        'marital_status',
        'age',
        'address', 
        'image', 
        'status'
    ];

    protected $hidden = [
        'password',
    ];

    public function invoices()
    {
        return $this->hasMany('App\Models\CustomerInvoice');
    }
    public function pos()
    {
        return $this->hasMany('App\Models\POS');
    }
}
