<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Security\AuthController;
use App\Http\Controllers\Home\HomeController;


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

Route::get('unauthorized', function () {
    return response()->redirectTo("/login");
})->name('unauthorized');

Route::get('/login', [WebAuthController::class, 'login'])->name('app.login');
Route::post('/authenticate', [WebAuthController::class, 'authenticate'])->name('app.authenticate');




Route::group(['middleware' => ['auth']], function() {
    Route::get('/',[HomeController::class, 'Index'])->name('app.home');
});