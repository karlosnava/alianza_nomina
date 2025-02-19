<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Carlos',
            'middle_name' => 'Jose',
            'first_surname' => 'Rodriguez',
            'second_surname' => 'Navarro',
            'document_type_id' => 1,
            'document' => '1001001',
            'address' => 'Calle 122 #1-1',
            'phone' => '31653906',
            'country_id' => 1,
            'city_id' => 1,
            'email' => 'presidente@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'boss_id' => NULL,
            'role_id' => 3,
        ]);
        
        User::create([
            'first_name' => 'Carlos',
            'middle_name' => 'Jose',
            'first_surname' => 'Rodriguez',
            'second_surname' => 'Navarro',
            'document_type_id' => 1,
            'document' => '12345678',
            'address' => 'Calle 122 #1-1',
            'phone' => '3165390655',
            'country_id' => 1,
            'city_id' => 1,
            'email' => 'carlosjoser717@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'boss_id' => NULL,
            'role_id' => 2,
        ]);
    }
}
