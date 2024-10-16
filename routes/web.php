<?php

use App\Http\Controllers\AdminConferenceManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('conference', [AdminConferenceManagementController::class, 'index'])->name('conference.index'); // List all conferences
Route::get('conference/create', [AdminConferenceManagementController::class, 'create'])->name('conference.create'); // Show form to create a new con


Route::post('conference', [AdminConferenceManagementController::class, 'store'])->name('conference.store'); // Store new conference

Route::get('conference/edit/{conference}', [AdminConferenceManagementController::class, 'edit'])->name('conference.edit'); // Show form to edit an existing conference
Route::put('conference/{conference}', [AdminConferenceManagementController::class, 'update'])->name('conference.update'); // Update the existing conference

Route::delete('conference/{id}', [AdminConferenceManagementController::class, 'destroy'])->name('conference.destroy'); // Delete a conference



