<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    // Show selection page
    public function showSelection()
    {
        return view('auth.register.selection');
    }

    // Show job seeker registration form
    public function showJobSeekerForm()
    {
        return view('auth.register.job-seeker');
    }

    // Show employer registration form
    public function showEmployerForm()
    {
        return view('auth.register.employer');
    }

    protected $sessionController;

    public function __construct(SessionController $sessionController)
    {
        $this->sessionController = $sessionController;
    }

    public function registerEmployer(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(3)],
        ]);

        $employerAttributes = $request->validate([
            'employer' => ['required'],
            'logo' => ['required', File::types(['png', 'jpg', 'webp'])],
        ]);

        $user = User::create($userAttributes);

        $logoPath = $request->logo->store('logos');

        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath,
        ]);

        $this->sessionController->store();

        session(['is_employer' => true]);

        return redirect('/dashboard');
    }

    public function registerJobSeeker(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(3)],
        ]);

        $user = User::create($userAttributes);

        $this->sessionController->store();

        session(['is_employer' => false]);

        return redirect('/');
    }
}
