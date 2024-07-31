<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Define the relationship with RecieptCustomer
    public function recieptCustomers()
    {
        return $this->hasMany(RecieptCustomer::class, 'customerId', 'id');
    }

}

