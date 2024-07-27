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
}
