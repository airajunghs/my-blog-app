<?php

use App\Http\Controllers\BlogController;
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
//index =method

//Manage user, create
Route::get('/users/create',
[UserController::class, 'create'
])->name('users/create'); 

//UserController tempat simpan fx create. create adalah fx untuk create new username
//create =method

Route::get('/blogs',
[BlogController::class, 'index'
])->name('blogs'); 

Route::get('/blogs/create',
[BlogController::class, 'create'
])->name('blogs.create');

//store process,guna post
Route::post('/blogs/store',
[BlogController::class, 'store'
])->name('blogs.store');

//edit 
Route::get('/blogs/{id}/edit',
[BlogController::class, 'edit'
])->name('blogs.edit');

//update blogs process
Route::put('/blogs/{id}/update',
[BlogController::class, 'update'
])->name('blogs.update');

//delete blog
Route::delete('/blogs/{id}/delete',
[BlogController::class, 'delete'
])->name('blogs.delete');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
