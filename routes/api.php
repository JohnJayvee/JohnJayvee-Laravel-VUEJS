<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Auth::routes();

Route::middleware('auth:sanctum')->get('/user', [LoginController::class, 'getUser']);

// Route::post('contacts/store/', [ContactController::class, 'store'])->name('contact.store');


Route::get('/contacts/index', [ContactController::class, 'index'])->name('contact.index');
Route::delete('/contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::put('/contacts/update/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('/contacts/show/{id}', [ContactController::class, 'show'])->name('contact.show');

Route::post('/contacts/store/', [ContactController::class, 'store'])->name('contact.store');
