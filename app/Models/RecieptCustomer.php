<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecieptCustomer extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'reciept_customer';

    // Disable timestamps if your table doesn't have created_at and updated_at columns
    public $timestamps = false;

    public function details()
    {
        return $this->hasMany(RecieptDetail::class, 'RecieptId', 'RecieptId');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'customerId', 'id');
    }
}
