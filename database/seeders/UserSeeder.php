<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'user_type' => 'admin',
            'phone_number' => '',
            'password' => Hash::make('ebsl6405'),
        ],
        [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'phone_number' => '',
            'password' => Hash::make('admin123'),
        ],
        [
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'user_type' => 'vendor',
            'phone_number' => '',
            'password' => Hash::make('vendor123'),
        ],
    );
    }
}
