<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    public $table = 'tbl_contact';
    public $fillable = [
        'name', 'email', 'title',
        'content', 'activated'
    ];
}
