<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_category';
    protected $fillable = ['name', 'slug', 'activated'];

    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function productCategory()
    {
        return $this->hasMany(ProductModel::class, 'category_id', 'id');
    }
}
