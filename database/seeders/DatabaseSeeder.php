<?php

namespace Database\Seeders;

use App\Models\Maladie;
use App\Models\Plante;
use App\Models\PlanteMaladie;
use App\Models\Savoir;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Plante::factory(500)->create();
        Maladie::factory(105)->create();
        Savoir::factory(1000)->create();
    }
}
