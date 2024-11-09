<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        'type' => ['required'],  // Ensure 'type' is validated
    ]);

    // Attempt to log the user in
    if (Auth::attempt($request->only('email', 'password'))) {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the 'type' matches
        if ($user->type == $request['type']) {
            // Redirect based on user type
            switch ($user->type) {
                case 'admin':
                    return redirect()->route('admin.main');  // Redirect to admin dashboard
                case 'client':
                    return redirect()->route('client.index');  // Redirect to client dashboard
                case 'employee':
                    return redirect()->route('employee.index');  // Redirect to employee dashboard
                default:
                    // Optionally handle other cases if needed
                    return redirect()->route('login');  // Redirect back to login
            }
        } else {
            // Logout the user if the 'type' does not match
            Auth::logout();

            // Redirect to login page with an error message
            return redirect()->route('login')->withErrors(['type' => 'The selected type does not match. Please try again.']);
        }
    }

    // If authentication fails, redirect back to the login page with an error message
    return redirect()->route('login')->withErrors(['email' => 'Invalid email or password.']);
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
