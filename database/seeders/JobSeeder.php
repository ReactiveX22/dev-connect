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
        $jobs = Job::factory(20)->create();

        $tags = Tag::all();

        $jobs->each(function ($job) use ($tags) {
            $randomTags = $tags->random(rand(1, 3));
            $job->tags()->attach($randomTags->pluck('id')->toArray());
        });
    }
}
