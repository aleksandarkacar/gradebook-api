<?php

namespace Database\Factories;

use App\Models\Gradebook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'img_url' =>  'https://picsum.photos/200',
            'gradebook_id' => Gradebook::all()->random()->id
        ];
    }
}
