<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'user')->get();
        return view('admin.user.list', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
        ]);

        try {
            // Create the user
            $user = User::create([
                'name' => $validatedData['name'],
                'sur_name' => $validatedData['sur_name'],
                'email' => $validatedData['email'],
                'type' => 'user',
            ]);

            // Flash message to show success
            session()->flash('success', 'User created successfully!');

        } catch (\Exception $e) {
            // Log the error for debugging
            // Flash message to show error
            session()->flash('error', 'An error occurred while creating the user: '.$e->getMessage());
        }

        // Redirect to a specific page
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $conferences = $user->conferences;
        return view('admin.user.view', compact('user', 'conferences'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        try {
            // Create the user
            $user->update([
                'name' => $validatedData['name'],
                'sur_name' => $validatedData['sur_name'],
                'email' => $validatedData['email'],
                'type' => 'user',
            ]);

            // Flash message to show success
            session()->flash('success', 'User updated successfully!');

        } catch (\Exception $e) {
            // Log the error for debugging
            // Flash message to show error
            session()->flash('error', 'An error occurred while creating the user: '.$e->getMessage());
        }

        // Redirect to a specific page
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        // Attempt to delete the conference
        try {
            $id->delete(); // or $AdminUserManagement->forceDelete(); if using soft deletes

            // Flash success message
            session()->flash('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors during deletion (optional)
            session()->flash('error', 'An error occurred while deleting the user: '.$e->getMessage());
        }

        // Redirect back to the index or another page
        return redirect()->route('admin.user.index');
    }
}
