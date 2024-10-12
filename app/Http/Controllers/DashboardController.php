<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->employer);

        $jobs = Auth::user()->employer->jobs()->withCount('applications')->get();

        return view('employers.dashboard', [
            'jobs' => $jobs,
        ]);
    }
}
