<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('tbl_role')->insert([
            'name' => 'Admin',
            'activated' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('tbl_role')->insert([
            'name' => 'Manager',
            'activated' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('tbl_admin')->insert([
            'name' => 'Admin',
            'gender' => 0,
            'birth' => '1998-06-13',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'avatar' => 'uploads/avatar/admin/admin.png',
            'phone' => '0975041697',
            'activated' => 1,
            'address' => '',
            'city_id' => 34,
            'district_id' => 339,
            'ward_id' => 12673,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
        DB::table('tbl_admin')->insert([
            'name' => 'Manager',
            'gender' => 1,
            'birth' => '2000-06-13',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('manager'),
            'role_id' => 2,
            'avatar' => 'uploads/avatar/admin/manager.png',
            'phone' => '0988603702',
            'activated' => 1,
            'address' => '',
            'city_id' => 2,
            'district_id' => 27,
            'ward_id' => 815,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
