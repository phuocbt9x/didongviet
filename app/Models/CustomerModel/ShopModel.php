<?php

namespace App\Models\CustomerModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
