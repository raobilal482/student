<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\AdminConferenceManagement;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = AdminConferenceManagement::all();
        return view('client.list',[
            'conferences' => $conferences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
        ]);
        $user = User::create([
            'name' => $validatedData['name'],
            'sur_name' => $validatedData['sur_name'],
        ]);

        // Flash message to show success (optional)
        session()->flash('success', 'User created successfully!');

        // Redirect to a specific page (e.g., index or show)
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('client.view',['user'=>$user]);
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
            session()->flash('error', 'An error occurred while deleting the User: ' . $e->getMessage());
        }

        // Redirect back to the index or another page
        return redirect()->route('client.index');
    }
}