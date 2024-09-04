<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IssuesController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/issues', [IssuesController::class, "index"])->name('issues');
Route::get('/issues/create', [IssuesController::class, "create"])->name('issues.create');
Route::post('/issues', [IssuesController::class, "addToDB"]);
Route::get('/issues/{issue}', [IssuesController::class, 'details'])->name('issues.details');
Route::get('/issues/edit/{issue}', [IssuesController::class, 'edit'])->name('issues.edit');
Route::post('/issues/update/{issue}', [IssuesController::class, 'update']);
Route::get('/issues/delete/{issue}', [IssuesController::class, 'delete'])->name('issues.delete');

Route::get('/projects', [ProjectsController::class, "index"])->name('projects');
Route::get('/projects/create', [ProjectsController::class, "create"])->name('projects.create');
Route::post('/projects', [ProjectsController::class, "addToDB"])->name('projects.addToDB');
Route::get('/projects/edit/{id}', [ProjectsController::class, "edit"])->name('projects.edit');
Route::post('/projects/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');

require __DIR__.'/auth.php';
