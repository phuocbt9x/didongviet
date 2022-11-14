<?php

namespace App\Models\CustomerModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_review';
    protected $fillable = ['name', 'email', 'star', 'comment', 'product_id', 'activated'];

    public function avatar()
    {
        return MemberModel::where('email', $this->email)->first();
    }
}
