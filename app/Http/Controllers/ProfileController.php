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
            return view('profiles.employer', ['employer' => $user->employer]);
        }

        return view('profiles.jobseeker', ['user' => $user]);
    }
}
