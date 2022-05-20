<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if (!Auth::check()) {
        return view('index');
    } else {
        return redirect('/dashboard');
    }
});

Route::get('/index', function () {
    if (!Auth::check()) {
        return redirect('/');
    } else {
        return redirect('/dashboard');
    }
});

Route::post('/index', function () {
    if (!Auth::check()) {
        return redirect('/');
    } else {
        return redirect('/dashboard');
    }
});

Route::get('/dashboard', function () {
/*
$requests = intval((100 * Session::get('TodayRequests')) / Session::get('TopRequests'));
$attacks = intval((100 * Session::get('TodayAttacks')) / Session::get('TopAttacks'));
$floods = intval((100 * Session::get('TodayFloods')) / Session::get('TopFloods'));

if ($requests > 100) {
$requests = 100;
}

if ($attacks > 100) {
$attacks = 100;
}

if ($floods > 100) {
$floods = 100;
}
 */
    $requests = 100;
    $floods = 100;
    $attacks = 100;

    return view('dashboard', ['requests' => $requests, 'attacks' => $attacks, 'floods' => $floods]);
})->middleware('auth');

Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');
Route::post('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

//Auth::routes();
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
