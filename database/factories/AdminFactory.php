<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [

            'name'          => $this->faker->name(),
            'email'             => $this->faker->unique()->safeEmail(),
            'role_id'           => 1,
            'password'          => '12345',
            'remember_token'    => Str::random(10)
        ];
    }
}
