<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Staff;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'userId' => (string) Str::uuid(),
            'staffId' => Staff::inRandomOrder()->first()->staffId,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('123456'),
            'createdBy' => $this->faker->name,
            'updatedBy' => $this->faker->name,
            'flag' => $this->faker->boolean,
        ];
    }
}
