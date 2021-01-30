<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'board' => $this->faker->numerify('####-###'),
            'brand' => $this->faker->vehicleBrand,
            'model' => $this->faker->vehicleModel,
            'color' => $this->faker->safeColorName,
            'year' => $this->faker->biasedNumberBetween(1970,2021, 'sqrt')
        ];
    }
}

