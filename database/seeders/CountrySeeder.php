<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Country;
use App\Models\City;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            [
                'name' => 'Colombia',
                'flag' => 'CO',
            ],
            [
                'name' => 'México',
                'flag' => 'MX',
            ],
            [
                'name' => 'Venezuela',
                'flag' => 'VE',
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }

        // Some cities to Colombia
        City::create(['name' => 'Barranquilla', 'country_id' => 1]);
        City::create(['name' => 'Bogotá D.C', 'country_id' => 1]);
        City::create(['name' => 'Cali', 'country_id' => 1]);
        City::create(['name' => 'Medellín', 'country_id' => 1]);
    }
}
