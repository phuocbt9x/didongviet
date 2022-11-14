<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValueModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_attribute_value';
    protected $fillable = ['attribute_id', 'value', 'activated'];

    public function attribute()
    {
        return $this->hasOne(AttributeModel::class, 'id', 'attribute_id');
    }

    public function attributeName()
    {
        dd($this);
    }
}
