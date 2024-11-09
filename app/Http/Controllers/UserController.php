<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function main(){
        return view('admin.main');
    }
    public function index()
    {
        $users = User::all();
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
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed', // Ensure you also use the confirmed rule
        ]);
    
        try{
            $user = User::create([
                'email' => $validated['email'],
                'name' => $validated['name'],
                'sur_name' => $validated['sur_name'],
                'type' => 'user',
                'password' => Hash::make($validated['password']), // Hash the password
            ]);

            session()->flash('success', 'User created successfully!');

        // Create the new user
      

            // Flash message to show success

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
