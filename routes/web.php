<?php

use App\Http\Controllers\UserController;
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
    return view('welcome'); //dashboard 
});

//manage user
// Route::get('/users', function () { //users adalah route
//     return "list users"; //page yang akan list kan users
// });

//Manage user
Route::get('/users',
[UserController::class, 'index'
])->name('users'); 

//UserController tempat simpan fx Index. Index adalah fx untuk simpan list name


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
