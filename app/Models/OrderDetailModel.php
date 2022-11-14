<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    public $table = 'tbl_order_detail';
    public $fillable = [
        'order_id', 'product_id', 'image',
        'price', 'quantity', 'total_price'
    ];
}
