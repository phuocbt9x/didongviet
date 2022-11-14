<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_attribute';
    protected $fillable = [
        'product_id', 'attribute_value_id'
    ];

    public function attributeValue()
    {
        return $this->hasOne(AttributeValueModel::class, 'id', 'attribute_value_id');
    }
}
