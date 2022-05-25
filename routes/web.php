<?php

use App\Models\SpectrumBalancer;
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
    return (!Auth::check()) ? view('index') : redirect('/dashboard');
});

Route::post('/', function () {
    return (!Auth::check()) ? view('index') : redirect('/dashboard');
});

Route::get('/index', function () {
    return (!Auth::check()) ? view('index') : redirect('/dashboard');
});

Route::post('/index', function () {
    return (!Auth::check()) ? view('index') : redirect('/dashboard');
});

Route::get('/dashboard', function () {
    // Esto debería pasarse a un controlador, pero no he tenido tiempo
    $clientData = Session::get('spectrum');

    $requests = 0;
    $attacks = 0;
    $floods = 0;

    // El control de errores podría ser muchísmo mejor, pero lo mismo de antes
    try {
        $requests = intval((100 * $clientData->TodayRequests) / $clientData->TopRequests);
    } catch (Exception $e) {
        $requests = 0;
    }
    try {
        $attacks = intval((100 * $clientData->TodayAttacks) / $clientData->TopAttacks);
    } catch (Exception $e) {
        $attacks = 0;
    }
    try {
        $floods = intval((100 * $clientData->TodayFloods) / $clientData->TopFloods);
    } catch (Exception $e) {
        $floods = 0;
    }

    return view('dashboard', [
        'requests' => ($requests > 1000) ? 100 : $requests,
        'attacks' => ($attacks > 1000) ? 100 : $attacks,
        'floods' => ($floods > 1000) ? 100 : $floods,
        'balancers' => SpectrumBalancer::where('SpectrumKey', '=', $clientData->SpectrumKey)->get(),
    ]);
})->middleware('auth');

Route::get('/ban-list', function () {
    return view('bans');
})->middleware('auth');

Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');
Route::post('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

//Auth::routes();
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
