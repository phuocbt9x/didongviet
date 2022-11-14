<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public $table = 'tbl_order';
    public $fillable = [
        'member', 'email', 'phone', 'address', 'city_id', 'district_id', 'ward_id',
        'note', 'status', 'payment_type', 'payment', 'admnin_id', 'total_price', 'coupon_id'
    ];
}
