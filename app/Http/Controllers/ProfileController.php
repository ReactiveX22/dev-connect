<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if ($user->employer) {
            // Redirect to employer profile view
            return view('profiles.employer', ['employer' => $user->employer]);
        }

        // Redirect to job-seeker profile view
        return view('profiles.jobseeker', ['user' => $user]);
    }
}
