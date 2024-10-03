<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = ['user_id', 'status', 'total_price']; // Add user_id here
}
