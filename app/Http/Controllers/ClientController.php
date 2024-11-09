<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ClientController extends Controller
{
    public function create()
    {
        // This is entery form in to client system
        return view('client.create');
    }

    public function index(Request $request)
    {
        if(FacadesAuth::user()->type != 'client'){
            return redirect()->route('login');
        }
        // This function is for showing all the listing of confereces when user can registered and view conference
        $conferences = Conference::all();
        return view('client.list', [
            'conferences' => $conferences,
            'user' => FacadesAuth::user(),

        ]);
    }

    public function conferenceRegister(Request $request)
    {
        // This function is for user register for conference
        $userid = $request->user_id;
        $conferenceid = $request->conference_id;
        $user = User::find($userid);

        if ($user) {
            // Check if the user is already registered for the conference
            if ($user->conferences()->where('conference_id', $conferenceid)->exists()) {
                return redirect()->back()->with('error', 'You have already registered for this conference.');
            }

            // Register the conference if not already registered
            $user->conferences()->attach($conferenceid);

            // If the user registered successfully display the success message
            return redirect()->back()->with('success', 'You are registered successfully.');
        }

        // If the user is not registered then display the error message
        return redirect()->back()->with('error', 'User not found.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // This is kind of for login in system
        $user = User::where('name', $request->name)
            ->where('sur_name', $request->sur_name)
            ->first();
        if ($user) {
            return redirect()->route('client.index', ['user' => $user])->with('success', 'Welcome '.$user->name.'!...');
        } else {
            return redirect()->back()->with('error', 'You are not registered yet! Please request admin for enter your details');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($conferenceId)
    {
$conference = Conference::find($conferenceId);        //This function is for showing the details
        return view('client.view', [
            'conference' => $conference,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('client.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
        ]);

        // Update the conference using the validated data
        $user->update([
            'name' => $validatedData['name'],
            'sur_name' => $validatedData['sur_name'],

        ]);

        // Flash message to show success
        session()->flash('success', 'User updated successfully!');

        // Redirect to the conference index or another page
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        // Attempt to delete the conference
        try {
            $id->delete(); // or $adminConferenceManagement->forceDelete(); if using soft deletes

            // Flash success message
            session()->flash('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors during deletion (optional)
            session()->flash('error', 'An error occurred while deleting the User: '.$e->getMessage());
        }

        // Redirect back to the index or another page
        return redirect()->route('client.index');
    }
}
