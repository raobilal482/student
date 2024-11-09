<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


Route::post('student/register', [StudentController::class, 'register'])->name('student.register'); 
Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');


//Routes for Conference Management
Route::get('conference', [ConferenceController::class, 'index'])->name('conference.index'); // List all conferences
Route::get('conference/show/{conference}', [ConferenceController::class, 'show'])->name('conference.show');
Route::get('conference/create', [ConferenceController::class, 'create'])->name('conference.create'); // Show form to
Route::post('conference', [ConferenceController::class, 'store'])->name('conference.store'); // Store new conference
Route::get('conference/edit/{conference}', [ConferenceController::class, 'edit'])->name('conference.edit'); // Show form to edit an existing conference
Route::put('conference/{conference}', [ConferenceController::class, 'update'])->name('conference.update'); // Update the existing conference
Route::delete('conference/{id}', [ConferenceController::class, 'destroy'])->name('conference.destroy'); // Delete a conference


//Routes for Client 
Route::get('client', [ClientController::class, 'index'])->name('client.index'); // List all clients
Route::get('client/create', [ClientController::class, 'create'])->name('client.create'); // Show form to
Route::post('client', [ClientController::class, 'store'])->name('client.store'); // Store new client
Route::get('client/show/{client}', [ClientController::class, 'show'])->name('client.show'); // Show form to edit an existing client
// Route::get('client/show/{conference}', [ClientController::class, 'show'])->name('client.show'); // Show form to edit an existing client
Route::get('client/edit/{client}', [ClientController::class, 'edit'])->name('client.edit'); // Show form to edit an existing client
Route::put('client/{client}', [ClientController::class, 'update'])->name('client.update'); // Update the existing client
Route::delete('client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
Route::post('register/conference', [ClientController::class, 'conferenceRegister'])->name('conference.register');
// Route::post('register/conference', [ClientController::class, 'conferenceRegister'])->name('conference.register');
Route::get('conference/{conference}', [ClientController::class, 'conferenceView'])->name('conference.view');



//Route for employee
Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index'); // List all employees
Route::get('employee/conference/{conference}', [EmployeeController::class, 'show'])->name('employee.conference.view'); // Show form to edit an existing 


//for user management
Route::get('admin/main', [UserController::class, 'main'])->name('admin.main'); // List all conferences
Route::get('admin/user', [UserController::class, 'index'])->name('admin.user.index'); // List all conferences
Route::get('admin/user/show/{user}', [UserController::class, 'show'])->name('admin.user.show'); // List all conferences
Route::get('admin/user/create', [UserController::class, 'create'])->name('admin.user.create'); // Show form to
Route::post('admin/user', [UserController::class, 'store'])->name('admin.user.store'); // Store new admin.user
Route::get('admin/user/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit'); // Show form to edit an existing admin.user
Route::put('admin/user/{user}', [UserController::class, 'update'])->name('admin.user.update'); // Update the existing admin.user
Route::delete('admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
Route::get('employee/conference/{conference}', [EmployeeController::class, 'show'])->name('employee.conference.view'); 