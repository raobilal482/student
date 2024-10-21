<?php

namespace App\Http\Controllers;

use App\Models\Conference;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = Conference::all();

        return view('employee.list', [
            'conferences' => $conferences,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        $users = $conference->users;

        return view('employee.view', [
            'conference' => $conference,
            'users' => $users,
        ]);
    }
}
