<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminConferenceManagementRequest;
use App\Http\Requests\UpdateAdminConferenceManagementRequest;
use App\Models\AdminConferenceManagement;

class AdminConferenceManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = AdminConferenceManagement::all();
        return view('admin.conference.list',[
            'conferences' => $conferences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conference.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminConferenceManagementRequest $request)
    {

        $validatedData = $request->validated();

        $conference = AdminConferenceManagement::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'lecturers' => json_encode(explode(',', $validatedData['lecturers'])),
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'address' => $validatedData['address'],
        ]);

        // Flash message to show success (optional)
        session()->flash('success', 'Conference created successfully!');

        // Redirect to a specific page (e.g., index or show)
        return redirect()->route('conference.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminConferenceManagement $conference)
    {
        return view('admin.conference.view',compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminConferenceManagement $conference)
    {
        return view('admin.conference.edit', compact('conference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAdminConferenceManagementRequest $request, AdminConferenceManagement $conference)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Update the conference using the validated data
        $conference->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'lecturers' => json_encode(explode(',', $validatedData['lecturers'])), // Convert to JSON format
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'address' => $validatedData['address'],
        ]);

        // Flash message to show success
        session()->flash('success', 'Conference updated successfully!');

        // Redirect to the conference index or another page
        return redirect()->route('conference.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminConferenceManagement $id)
    {
        // Attempt to delete the conference
        try {
            $id->delete(); // or $adminConferenceManagement->forceDelete(); if using soft deletes

            // Flash success message
            session()->flash('success', 'Conference deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors during deletion (optional)
            session()->flash('error', 'An error occurred while deleting the conference: ' . $e->getMessage());
        }

        // Redirect back to the index or another page
        return redirect()->route('conference.index');
    }


}
