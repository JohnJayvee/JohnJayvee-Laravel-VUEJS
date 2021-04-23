<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\VueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('{any}', [VueController::class, 'index'])->where('any', '^(?!api).*$');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/change-password', [UpdateProfileController::class, 'index']);
// Route::post('/change-password', [UpdateProfileController::class, 'store'])->name('change.password');


// Route::grouppppppppppppppon() {})
// /*
// |--------------------------------------------------------------------------
// | Users Routes
// |--------------------------------------------------------------------------
// */
// Route::middleware(['auth'])->group(function () {

//     Route::get('/users', [UsersController::class, 'index'])->name('user.index');
//     Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
//     Route::post('/users/store/', [UsersController::class, 'store'])->name('user.store');
//     Route::get('/users/{id}', [UsersController::class, 'show'])->name('user.show');
//     Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
// });


// /*
// |--------------------------------------------------------------------------
// | Contacts Routes
// |--------------------------------------------------------------------------
// */
// Route::middleware(['auth'])->group(function () {

// Route::get('/contacts/create/', [ContactController::class, 'create'])->name('contact.create');
//     Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
//     Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contact.show');
//     Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
//     Route::post('/contacts/store/', [ContactController::class, 'store'])->name('contact.store');
//     Route::put('/contacts/{id}/update', [ContactController::class, 'update'])->name('contact.update');
//     Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
// });

Route::get('api/contacts/index', [ContactController::class, 'index'])->name('contact.index');
Route::delete('api/contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::put('api/contacts/update/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::get('api/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('api/contacts/show/{id}', [ContactController::class, 'show'])->name('contact.show');

Route::post('api/contacts/store/', [ContactController::class, 'store'])->name('contact.store');

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/', function () {
//     //
// })->middleware('web');

// Route::middleware(['web'])->group(function () {
//     //
// });
// Route::get('/users', [UsersController::class, 'index'])->middleware('auth')->name('user.index');
