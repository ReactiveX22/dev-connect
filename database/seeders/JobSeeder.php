<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create jobs
        $jobs = Job::factory(20)->create();

        // Get all tags
        $tags = Tag::all();

        $jobs->each(function ($job) use ($tags) {
            $randomTags = $tags->random(rand(2, 5));
            $job->tags()->attach($randomTags->pluck('id')->toArray());
        });
    }
}
