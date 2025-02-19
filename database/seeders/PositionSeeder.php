<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run()
    {
        $positions = [
            [
                'name' => 'Desarrollador Full-Stack',
                'salary' => '3000000',
            ],
            [
                'name' => 'Asistente de tecnología',
                'salary' => '1500000',
            ],
            [
                'name' => 'Contador',
                'salary' => '2500000',
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
