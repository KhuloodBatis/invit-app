<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivateIndexController;
use App\Http\Controllers\ActivateStoreController;
use App\Http\Controllers\InvitCodeIndexController;
use App\Http\Controllers\InvitCodeStoreController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'activated']], function () {

    Route::get('/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');

    Route::get('/invites',InvitCodeIndexController::class)->name('invites');
    Route::post('/invites',InvitCodeStoreController::class);
});

Route::get('/activate', ActivateIndexController::class)->name('activate');
Route::post('/activate', ActivateStoreController::class);



require __DIR__ . '/auth.php';
