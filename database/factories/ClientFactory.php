<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cpf' => $this->faker->numerify('###.###.###/##'),
            'email' => $this->faker->unique()->freeEmail,
            'phone' => $this->faker->numerify('(17)9####-####'),
            'password' => $this->faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}')
        ];
    }
}
