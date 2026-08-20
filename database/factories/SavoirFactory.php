<?php

namespace Database\Factories;

use App\Models\Maladie;
use App\Models\Plante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Savoir>
 */
class SavoirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plante_id' => Plante::random() ?: Plante::factory(),
            'maladie_id' => Maladie::random() ?: Maladie::factory(),
        ];
    }
}
