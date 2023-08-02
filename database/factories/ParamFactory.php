<?php

namespace Database\Factories;

use App\Models\Param;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ParamFactory extends Factory
{
    protected $model = Param::class;

    public function definition()
    {
        return [
			'code' => $this->faker->name,
			'redirect_url' => $this->faker->name,
			'client_id' => $this->faker->name,
			'client_secret' => $this->faker->name,
			'grant_type' => $this->faker->name,
			'refresh_token' => $this->faker->name,
        ];
    }
}
