<?php

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\WebAuthController;

/*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/

// Public Routes :

// Display login form
Route::get('/login', [WebAuthController::class, 'showLoginForm']);

// Handle login form submission
Route::post('/login', [WebAuthController::class, 'processLogin'])->name('login');

/*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/

// Private Routes :

/*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/

Route::middleware('web-auth')->group(function () {

    // Groups :

    // index :

    Route::get('/groups', [GroupController::class, 'index'])->name('groups');

    // Show Group Files :

    Route::post('/groupfiles', [GroupController::class, 'show'])->name('group.files.show');

    // add Group :
    Route::get('/groups/add', [GroupController::class, 'create'])->name('groups.add');
    Route::post('/groups/add', [GroupController::class, 'store'])->name('groups.store');

    /*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/


    // Files :

    // index For All Files ( For Admin ) :

    Route::get('/files', [FileController::class, 'index'])->name('files');

    // Add and Upload File  :

    Route::get('/files/add', [FileController::class, 'create'])->name('files.add');

    Route::post('upload_file', [FileController::class, 'upload_file']);

    // Download  Files :

    Route::post('downloadfile', [FileController::class, 'downloadfile']);

    /*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/


    // Users Permissions In One Group :

    Route::get('/groups/edit-permissions/{id}', [GroupController::class, 'edit_permissions'])->name('edit-permissions');

    // Add user to a group (add Permission)

    Route::post('assign-user-to-group', [GroupController::class, 'assign_user_to_group'])->name('assign-user-to-group');

    // Remove user from a group (Remove Permission)

    Route::post('remove-user-from-group', [GroupController::class, 'remove_user_from_group'])->name('remove-user-from-group');

    /*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/

    // Checkin (reserve a file ) :

    Route::post('check-in', [FileController::class, 'check_in'])->name('check-in');

    Route::get('checked-in-files', [FileController::class, 'checked_in_files'])->name('checked-in-files');

    // // Checkout (free a file ) :

    Route::get('check-out-form', [FileController::class, 'check_out_form'])->name('check-out-form');

    Route::post('check-out', [FileController::class, 'check_out'])->name('check-out');

    Route::post('multi-check-in', [FileController::class, 'multi_check_in'])->name('multi-check-in');

    /*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/

    // Show All Users :

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/user-checks-in-report', [UserController::class, 'user_checks_in_report'])->name('user-checks-in-report');


});
