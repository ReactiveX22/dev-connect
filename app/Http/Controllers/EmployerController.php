<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::latest()->with('jobs')->get();


        return view('employer.index', [
            'employers' => $employers,
        ]);
    }

    public function show(Employer $employer)
    {
        $employer->load('jobs');

        return view('employer.show', [
            'employer' => $employer,
        ]);
    }
}
