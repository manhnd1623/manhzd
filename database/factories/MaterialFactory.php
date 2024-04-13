<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $active = collect([
            Material::ACTIVE,
            Material::INACTIVE,
        ])->random(1)[0];

        return [
            'name'=>fake()->text(50),
            'serial' =>fake()->text(50),
            'modal'=>fake()->text(50),
            'is_active'=> $active,
            'img'=>fake()->imageUrl,
        ];
    }
}
