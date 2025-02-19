<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(PositionSeeder::class);
        
        $this->call(UserSeeder::class);
        User::factory(10)->create();
    }
}
