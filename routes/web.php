<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

// Public Routes :

// Display login form
Route::get('/login', [WebAuthController::class, 'showLoginForm']);

// Handle login form submission
Route::post('/login', [WebAuthController::class, 'processLogin'])->name('login');


// Private Routes :

// Route::middleware('web-auth')->group(function ()
// {
//     // index :
//     Route::get('/groups', [EmployeeController::class, 'index'])->name('employees');

//     Route::prefix('groups')->group(function (){
//         Route::get('/',[GroupController::class,'index']);

//     });
// });



