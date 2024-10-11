<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply(Request $request, $jobId)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $job = Job::findOrFail($jobId);

        // Handle file upload
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');

            // Create job application
            JobApplication::create([
                'user_id' => Auth::id(),
                'job_id' => $job->id,
                'resume' => $resumePath,
            ]);

            return redirect()->back()->with('success', 'You have successfully applied for the job.');
        }

        return redirect()->back()->with('error', 'Resume upload failed.');
    }


    public function showApplications($jobId)
    {
        $job = Job::findOrFail($jobId);
        $applications = $job->applications()->get();

        return view('jobs.applications', compact('applications', 'job'));
    }
}
