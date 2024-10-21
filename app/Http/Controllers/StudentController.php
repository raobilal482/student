<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function home()
    {
        $student = User::where('type', 'student')->first();
        if ($student) {
            return redirect()->route('student.profile', ['student' => $student]);
        } else {
            return view('student.register');
        }
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'sur_name' => 'required',
            'group' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        // Create the student user
        $student = User::create([
            'name' => $validatedData['name'],
            'sur_name' => $validatedData['sur_name'],
            'group' => $validatedData['group'],
            'email' => $validatedData['email'],
            'type' => 'student',
        ]);

        if ($student) {
            return redirect()->route('student.profile', ['student' => $student])
                ->with('success', 'You are registered successfully.');
        }

        // Optionally handle the case where registration fails
        return back()->with('error', 'Registration failed. Please try again.');
    }

    public function profile()
    {

        $userCount = User::all()->count();
        if ($userCount > 0) {
            $student = User::where('type', 'student')->get()->first();
            return view('student.profile', compact('student'));
        } else {
            return redirect()->route('home')->with('error', 'Profile not found.');

        }
    }
}
