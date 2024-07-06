<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StaffFactory extends Factory
{
    protected $model = \App\Models\Staff::class;

    public function definition()
    {
        return [
            'staffId' => (string) Str::uuid(),
            'code' => $this->faker->unique()->numerify('CODE###'),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'joinedDate' => $this->faker->date(),
            'depId' => Department::inRandomOrder()->first()->depId,
            'position' => $this->faker->jobTitle,
            'age' => $this->faker->numberBetween(20, 60),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'updatedBy' => $this->faker->name,
        ];
    }
}
