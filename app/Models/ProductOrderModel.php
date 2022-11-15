<?php

namespace App\Models;

use App\Models\AdminModel\AttributeValueModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrderModel extends Model
{
    use HasFactory;
    public $table = 'tbl_product_order';
    public $fillable = [
        'order_detail_id', 'product_attribute_id'
    ];

    public function infoAttributeValue()
    {
        return $this->hasOne(AttributeValueModel::class, 'id', 'product_attribute_id');
    }
}
