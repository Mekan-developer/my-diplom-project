<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '12345',
            'l_name' => 'Agamyradow',
            'f_name' => 'Mekan',
            'gender' => 'Male',
            'address' => 'Ashgabat, 30 mkr',
            'email' => 'mekan.developer@gmail.com',
            'user_name' => 'admin',
            'password' => bcrypt('secret'),
            'role_id' => 1
        ]);

        
    }
}
