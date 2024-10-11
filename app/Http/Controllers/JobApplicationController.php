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
        ], [
            'resume.required' => 'Please select your resume file.',
        ]);

        $job = Job::findOrFail($jobId);

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'private');

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

    public function delete($applicationId)
    {
        $application = JobApplication::findOrFail($applicationId);

        if ($application->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $filePath = storage_path('app/private/' . $application->resume);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $application->delete();

        return redirect()->back()->with('success', 'Application deleted successfully.');
    }
}
