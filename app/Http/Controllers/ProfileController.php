<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

    public function jobSeekerEdit()
    {
        $user = Auth::user();

        if ($user->employer) {
            return view('profiles.employer', ['employer' => $user->employer]);
        }

        return view('profiles.jobSeekerEdit', ['user' => $user]);
    }

    public function jobSeekerUpdate(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        if ($user->id !== $userId) {
            abort(403, 'Unauthorized action.');
        }

        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'password' => ['nullable', 'confirmed', 'min:6'],
        ]);

        $updateData = [
            'name' => $userAttributes['name'],
            'email' => $userAttributes['email'],
        ];

        if (!empty($request->password)) {
            $updateData['password'] = bcrypt($request->password);
        }

        $user->fill($updateData)->save();

        return redirect('/profile')->with('success', 'Profile updated successfully.');
    }
}
