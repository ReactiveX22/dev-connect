<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected array $descriptions = [
        "Join our dynamic team and contribute to exciting projects while developing your skills.",
        "Be part of a collaborative environment where your ideas are valued and encouraged.",
        "Help us drive innovation and achieve our goals through your expertise and creativity.",
        "Work in a fast-paced setting with opportunities for professional growth and development.",
        "Contribute to a mission-driven organization focused on delivering high-quality results.",
        "Engage with a diverse team and enhance your career in a supportive atmosphere.",
        "Take on new challenges and help shape the future of our organization.",
        "Join a team committed to excellence and make a meaningful impact.",
        "Collaborate with talented individuals to solve complex problems and achieve success.",
        "Be part of a forward-thinking company that values innovation and creativity.",
    ];

    protected array $titles = [
        'Frontend Developer',
        'Backend Developer',
        'Full Stack Developer',
        'DevOps Engineer',
        'Software Engineer',
        'Web Developer',
        'Mobile Developer',
        'Data Scientist',
        'Machine Learning Engineer',
        'Quality Assurance Engineer',
        'Systems Analyst',
        'Game Developer',
        'UX/UI Designer',
        'Technical Support Engineer',
        'Cloud Engineer',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->randomElement($this->titles), // Randomly selects a title from the dev-related titles
            'salary' => $this->faker->randomElement(['50,000 BDT', '60,000 BDT', '70,000 BDT']),
            'location' => $this->faker->city(),
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time', 'Contract']),
            'description' => $this->faker->randomElement($this->descriptions), // Randomly selects from the set
            'featured' => $this->faker->boolean(),
        ];
    }
}
