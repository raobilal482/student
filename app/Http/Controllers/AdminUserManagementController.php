<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminUserManagementRequest;
use App\Http\Requests\UpdateAdminUserManagementRequest;
use App\Models\AdminUserManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminUserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = AdminUserManagement::all();
        return view('admin.user.list',[
            'users' => $users
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
    ]);

    try {
        // Create the user
        $user = AdminUserManagement::create([
            'name' => $validatedData['name'],
            'sur_name' => $validatedData['sur_name'],
            'type' => 'user'
        ]);

        // Flash message to show success
        session()->flash('success', 'User created successfully!');

    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Error creating user: ' . $e->getMessage());
        // Flash message to show error
        session()->flash('error', 'An error occurred while creating the user: ' . $e->getMessage());
    }

    // Redirect to a specific page
    return redirect()->route('admin.user.index');
}

    

    /**
     * Display the specified resource.
     */
    public function show(AdminUserManagement $user)
    {
        return view('admin.user.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminUserManagement $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminUserManagement $user)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
        ]);
    
        try {
            // Create the user
            $user = AdminUserManagement::create([
                'name' => $validatedData['name'],
                'sur_name' => $validatedData['sur_name'],
                'type' => 'user'
            ]);
    
            // Flash message to show success
            session()->flash('success', 'User created successfully!');
    
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error creating user: ' . $e->getMessage());
            // Flash message to show error
            session()->flash('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
    
        // Redirect to a specific page
        return redirect()->route('admin.user.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminUserManagement $id)
    {
        // Attempt to delete the conference
        try {
            $id->delete(); // or $AdminUserManagement->forceDelete(); if using soft deletes

            // Flash success message
            session()->flash('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors during deletion (optional)
            session()->flash('error', 'An error occurred while deleting the user: ' . $e->getMessage());
        }

        // Redirect back to the index or another page
        return redirect()->route('admin.user.index');
    }

}
