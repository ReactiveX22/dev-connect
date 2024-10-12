<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch jobs grouped by 'featured' status
        $jobs = Job::latest()->with('employer', 'tags')->get()->groupBy('featured');

        // Limit featured jobs to 3
        $featuredJobs = $jobs[1]->take(3) ?? collect(); // Use null coalescence to handle case when there are no featured jobs

        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'jobs' => $jobs[0] ?? collect(), // Handle case where there are no non-featured jobs
            'tags' => Tag::all(),
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'description' => ['required'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag(trim($tag));
            }
        }

        return redirect('/dashboard')->with('success', 'Job posted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $job->load(['employer']);

        $application = null;
        $applications = [];
        $isOwnerOfJob = false;

        // no need for this, but maybe in future??
        if (session()->get('is_employer')) {
            $employer_user_id = $job->employer->user_id;

            if ($employer_user_id === Auth::user()->id) {
                $applications = JobApplication::where('job_id', $job->id)->get();
                $isOwnerOfJob = true;
            }
        }

        $application = JobApplication::where('user_id', Auth::id())
            ->where('job_id', $job->id)
            ->first();

        return view('jobs.show', [
            'job' => $job,
            'application' => $application,
            'applications' =>  $applications,
            'isOwnerOfJob' =>  $isOwnerOfJob
        ]);
    }

    public function downloadResume($applicationId)
    {
        $application = JobApplication::findOrFail($applicationId);

        if (!session()->get('is_employer')) {
            if ($application->user_id !== Auth::id()) {
                abort(403, 'Unauthorized action.');
            }
        }

        $filePath = storage_path('app/private/' . $application->resume);

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'description' => ['required'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');
        $job->update(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            $job->tags()->detach();

            foreach (explode(',', $attributes['tags']) as $tag) {
                $tag = trim($tag);
                $existingTag = Tag::firstOrCreate(['name' => $tag]);
                $job->tags()->attach($existingTag->id);
            }
        }

        return redirect()->route('jobs.show', $job->id)->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/dashboard')->with('success', 'Job deleted successfully.');
    }
}
