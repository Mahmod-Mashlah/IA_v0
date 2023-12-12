<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
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


// Private Routes :

Route::middleware('web-auth')->group(function ()
{


    // Groups :

            // index :

            Route::get('/groups',[GroupController::class, 'index'] )->name('groups');

            // add Group :
            Route::get('/groups/add', [GroupController::class, 'create'])->name('groups.add');
            Route::post('/groups/add', [GroupController::class, 'store'])->name('groups.store');

    // Files :

            // index :

            Route::get('/files',[FileController::class, 'index'] )->name('files');

          // add File :
          Route::get('/files/add', [FileController::class, 'create'])->name('files.add');
          Route::post('/files/add', [FileController::class, 'store'])->name('files.store');
          // Download
          Route::get('/files/download/{filename}', [FileController::class, 'download'])->name('files.download');

          Route::get('files/{plan}/edit', [FileController::class, 'edit'])->name('plans.edit');
          Route::put('files/{plan}', [FileController::class, 'update'])->name('plans.update');

});



