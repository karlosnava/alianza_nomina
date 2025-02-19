<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        $city = City::select(['id', 'country_id'])->inRandomOrder()->first();
        $boss_id = User::select(['id', 'country_id'])->inRandomOrder()->first();

        return [
            'first_name'       => $this->faker->firstNameMale(),
            'middle_name'      => $this->faker->firstNameMale(),
            'first_surname'    => $this->faker->lastName(),
            'second_surname'   => $this->faker->lastName(),
            'document_type_id' => $this->faker->numberBetween(1, 2, 3),
            'document'         => $this->faker->randomNumber(8, true),
            'address'          => $this->faker->streetAddress(),
            'phone'            => '316' . $this->faker->randomNumber(7, true),
            'country_id'       => $city->country_id,
            'city_id'          => $city->id,
            'email'            => $this->faker->unique()->safeEmail(),
            'password'         => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',   // password
            'boss_id'          => $boss_id,
            'role_id'          => $this->faker->numberBetween(1, 2),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
