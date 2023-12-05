<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\WebAuthController;

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



// Public Routes :

// Display login form
Route::get('/login', [WebAuthController::class, 'showLoginForm']);

// Handle login form submission
Route::post('/login', [WebAuthController::class, 'processLogin'])->name('login');


Route::get('/g', function () {
    return view('Groups.index');
});

// Private Routes :

Route::middleware('web-auth')->group(function ()
{


    // Groups :

            // index :

            Route::get('/groups',[GroupController::class, 'index'] )->name('groups');

            // add Group :
            Route::get('/groups/add', [GroupController::class, 'create'])->name('groups.add');
            Route::post('/groups/add', [GroupController::class, 'store'])->name('groups.store');

            // update Group :
            // Route::get('/groups/update', [GroupController::class, 'edit'])->name('groups.edit');
            // Route::post('/groups/update', [GroupController::class, 'update'])->name('groups.update');
            // Route::put('/groups/update/{id}', [GroupController::class, 'update'])->name('groups.update');
            Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
            Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');



});



