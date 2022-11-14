<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscountModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_discount';
    protected $fillable = ['product_id', 'discount_id', 'activated'];

    public function getDiscount()
    {
        return $this->hasOne(DiscountModel::class, 'id', 'discount_id');
    }
}
