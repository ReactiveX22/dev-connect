<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
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

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->developerTags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
