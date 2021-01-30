<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->count(5)
            ->has(Client::factory()->count(10))
            ->create();
    }
}