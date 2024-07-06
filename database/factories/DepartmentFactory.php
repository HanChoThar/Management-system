<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepartmentFactory extends Factory
{
    protected $model = \App\Models\Department::class;

    public function definition()
    {
        return [
            'depId' => (string) Str::uuid(),
            'name' => $this->faker->unique()->company,
            'label' => $this->faker->catchPhrase,
            'flag' => $this->faker->boolean,
        ];
    }
}
