<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::latest()->with('jobs')->get();


        return view('employers.index', [
            'employers' => $employers,
        ]);
    }

    public function show(Employer $employer)
    {
        $employer->load('jobs');

        return view('employers.show', [
            'employer' => $employer,
        ]);
    }

    public function edit(Employer $employer)
    {
        if ($employer->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('employers.edit', compact('employer'));
    }

    public function update(Request $request, Employer $employer)
    {
        if ($employer->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($employer->user_id)],
            'password' => ['nullable', 'confirmed', 'min:3'],
        ]);

        $employerAttributes = $request->validate([
            'employer' => ['required'],
            'logo' => ['nullable', 'file', 'mimes:png,jpg,webp'],
        ]);

        $user = User::findOrFail($employer->user_id);

        $updateData = [
            'name' => $userAttributes['name'],
            'email' => $userAttributes['email'],
        ];

        if (!empty($request->password)) {
            $updateData['password'] = bcrypt($request->password);
        }

        $user->update($updateData);

        if ($request->hasFile('logo')) {
            $logoPath = $request->logo->store('logos');
            $employer->update([
                'name' => $employerAttributes['employer'],
                'logo' => $logoPath,
            ]);
        } else {
            $employer->update([
                'name' => $employerAttributes['employer'],
            ]);
        }

        return redirect('/profile')->with('success', 'Profile updated successfully.');
    }
}
