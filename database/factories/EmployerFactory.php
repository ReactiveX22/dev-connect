<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->company(),
            'logo' => function () {
                // Get an array of all .png files in the public/logos directory
                $files = glob(storage_path('app/public/logos/*.png'));

                // If there are matching files, return a random file name, otherwise return a default image
                return count($files) > 0 ? 'logos/' . basename($files[array_rand($files)]) : 'default-logo.jpg';
            },
        ];
    }
}
