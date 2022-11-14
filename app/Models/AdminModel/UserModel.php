<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class UserModel extends User
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'admin';
    protected $table = 'tbl_admin';
    protected $fillable = ['role_id', 'name', 'gender', 'email', 'phone', 'password', 'birth', 'address', 'avatar', 'city_id', 'district_id', 'ward_id', 'activated'];
    protected $hidden = ['password'];

    public function role()
    {
        return $this->hasOne(RoleModel::class, 'id', 'role_id');
    }

    public function gender()
    {
        return ($this->gender == 0) ? 'Female' : 'Male';
    }
}
