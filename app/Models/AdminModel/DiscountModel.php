<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_discount';
    protected $fillable = ['name', 'type', 'value', 'activated'];
}
