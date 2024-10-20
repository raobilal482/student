<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\AdminConferenceManagement;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = AdminConferenceManagement::all();
        return view('employee.list',[
            'conferences' => $conferences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validated();

        $employee = Employee::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'lecturers' => json_encode(explode(',', $validatedData['lecturers'])),
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'address' => $validatedData['address'],
        ]);

        // Flash message to show success (optional)
        session()->flash('success', 'employee created successfully!');

        // Redirect to a specific page (e.g., index or show)
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminConferenceManagement $conference)
    {
        return view('employee.view',[
            'conference' => $conference
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the incoming request
        $validatedData = $request->validated();

        // Update the employee using the validated data
        $employee->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'lecturers' => json_encode(explode(',', $validatedData['lecturers'])), // Convert to JSON format
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'address' => $validatedData['address'],
        ]);

        // Flash message to show success
        session()->flash('success', 'employee updated successfully!');

        // Redirect to the employee index or another page
        return redirect()->route('employee.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $id)
    {
        // Attempt to delete the employee
        try {
            $id->delete(); // or $employeeManagement->forceDelete(); if using soft deletes

            // Flash success message
            session()->flash('success', 'employee deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors during deletion (optional)
            session()->flash('error', 'An error occurred while deleting the employee: ' . $e->getMessage());
        }

        // Redirect back to the index or another page
        return redirect()->route('employee.index');
    }
}