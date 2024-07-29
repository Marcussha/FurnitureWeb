<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecieptDetail extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'recieptdetail';

    // Disable timestamps if your table doesn't have created_at and updated_at columns
    public $timestamps = false;
    
    // Define the relationship with RecieptCustomer
    public function reciept()
    {
        return $this->belongsTo(RecieptCustomer::class, 'RecieptId', 'RecieptId');
    }

    // Define the relationship with Product (assuming you have a Product model)
    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}
