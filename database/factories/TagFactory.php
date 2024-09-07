<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private $developerTags = [
        'Front-end',
        'Back-end',
        'Full Stack',
        'DevOps',
        'Software Engineer',
        'Web Developer',
        'Mobile Developer',
        'Database Administrator',
        'QA Engineer',
        'Systems Analyst',
        'Embedded Systems Developer',
        'Game Developer',
        'Cloud Engineer',
    ];

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement($this->developerTags),
        ];
    }
}
