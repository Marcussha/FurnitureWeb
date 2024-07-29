<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Define the relationship with RecieptDetail
    public function recieptDetails()
    {
        return $this->hasMany(RecieptDetail::class, 'productID', 'productID');
    }
}
