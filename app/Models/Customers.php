<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    //to match it with table
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
}
