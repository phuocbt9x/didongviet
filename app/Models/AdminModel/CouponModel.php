<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_coupon';
    protected $fillable = ['code', 'type', 'value', 'stock', 'time_start', 'time_end', 'activated'];
}
