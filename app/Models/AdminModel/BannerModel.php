<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_banner';
    protected $fillable = ['type', 'title', 'content', 'image', 'link', 'time_start', 'time_end', 'activated'];
}
