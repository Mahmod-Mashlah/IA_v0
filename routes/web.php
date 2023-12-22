<?php

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\WebAuthController;


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

          // Add and Upload File  :

            Route::get('/files/add', [FileController::class, 'create'])->name('files.add');

            Route::post('upload_file',[FileController::class, 'upload_file']);

          // Download  Files :

            Route::post('downloadfile', [FileController::class, 'downloadfile']);

});




