<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'Empleado'],
            ['name' => 'Personal de nómina'],
            ['name' => 'Presidente'],
        ];
        
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
