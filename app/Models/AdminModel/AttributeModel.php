<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_attribute';
    protected $fillable = ['name', 'activated'];

    public function getValue()
    {
        return $this->hasMany(AttributeValueModel::class, 'attribute_id', 'id');
    }
}
