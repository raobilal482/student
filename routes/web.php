<?php

use App\Http\Controllers\AdminConferenceManagementController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/profile', function () {
    return view('mainpage.profile');
})->name('user.profile'); // List all clients


//for conference 
Route::get('conference', [AdminConferenceManagementController::class, 'index'])->name('conference.index'); // List all conferences
Route::get('conference/show/{conference}', [AdminConferenceManagementController::class, 'show'])->name('conference.show');

Route::get('conference/create', [AdminConferenceManagementController::class, 'create'])->name('conference.create'); // Show form to
Route::post('conference', [AdminConferenceManagementController::class, 'store'])->name('conference.store'); // Store new conference

Route::get('conference/edit/{conference}', [AdminConferenceManagementController::class, 'edit'])->name('conference.edit'); // Show form to edit an existing conference
Route::put('conference/{conference}', [AdminConferenceManagementController::class, 'update'])->name('conference.update'); // Update the existing conference

Route::delete('conference/{id}', [AdminConferenceManagementController::class, 'destroy'])->name('conference.destroy'); // Delete a conference
//for client
Route::get('client', [ClientController::class, 'index'])->name('client.index'); // List all clients
Route::get('client/create', [ClientController::class, 'create'])->name('client.create'); // Show form to
Route::post('client', [ClientController::class, 'store'])->name('client.store'); // Store new client
Route::get('client/show/{client}', [ClientController::class, 'show'])->name('client.show'); // Show form to edit an existing client
Route::get('client/edit/{client}', [ClientController::class, 'edit'])->name('client.edit'); // Show form to edit an existing client
Route::put('client/{client}', [ClientController::class, 'update'])->name('client.update'); // Update the existing client

Route::delete('client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
Route::get('register/conference/{conference}', [ClientController::class, 'conferenceRegister'])->name('conference.register');
Route::get('conference/{conference}', [ClientController::class, 'conferenceView'])->name('conference.view');

//for employee
Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index'); // List all employees

Route::get('employee/conference/{conference}', [EmployeeController::class, 'show'])->name('employee.conference.view'); // Show form to edit an existing 
//for user management
Route::get('admin/user', [AdminUserManagementController::class, 'index'])->name('admin.user.index'); // List all conferences
Route::get('admin/user/show/{user}', [AdminUserManagementController::class, 'show'])->name('admin.user.show'); // List all conferences

Route::get('admin/user/create', [AdminUserManagementController::class, 'create'])->name('admin.user.create'); // Show form to
Route::post('admin/user', [AdminUserManagementController::class, 'store'])->name('admin.user.store'); // Store new admin.user

Route::get('admin/user/edit/{user}', [AdminUserManagementController::class, 'edit'])->name('admin.user.edit'); // Show form to edit an existing admin.user
Route::put('admin/user/{user}', [AdminUserManagementController::class, 'update'])->name('admin.user.update'); // Update the existing admin.user

Route::delete('admin/user/{id}', [AdminUserManagementController::class, 'destroy'])->name('admin.user.destroy');


