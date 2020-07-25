<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'API\Auth\LoginController@login')->name('api.jwt.login');
Route::post('login-auth', 'API\Auth\LoginController@loginApi')->name('api.jwt.login');
Route::post('password/recuperar', 'API\Auth\ForgotPasswordController')->name('password.resetear');
Route::post('registrarse', 'API\Auth\RegisterController@register')->name('api.jwt.register');
Route::get('email/verificar/{id}', 'API\Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/reenviar', 'API\Auth\VerificationController@resend')->name('verification.resend');
//Route::post('password/email', 'Api\AuthController@sendPasswordResetLink');

Route::get('unauthorized', function () {
    return response()->json([
        'status' => 'error',
        'message' => 'No está autorizado'
    ], 401);
})->name('api.jwt.unauthorized');
// Route::get('entradas', 'API\BlogController@index')->name('api.entradas');

Route::group(['middleware' => ['cors']], function () {
    Route::post('perfil', 'API\UserController@perfil');

    //Route::post('register', 'Api\AuthController@register')->name('api.jwt.register');
    //Route::post('password/email', 'Api\AuthController@sendPasswordResetLink');
    //Route::post('password/email', 'Api\AuthController@sendResetLinkEmail');
    //Route::get('/api/entradas','API\BlogController@index')->name('api.entradas');
    //Route::post('entrada/guardar', 'API\BlogController@store')->middleware('auth', 'role:admin');
    //Route::post('entrada/guardar','API\BlogController@store');
    //Route::delete('entrada/{id}','Api\BlogController@destroy');
    Route::get('entradas/{id}', 'Api\BlogController@show')->name('api.entradas.show');
    //Route::post('entradas/{id}','Api\BlogController@update');

});


Route::group(['middleware' => 'auth:api'], function () {
    //Route::get('perfil', 'API\Auth\LoginController@user')->name('api.jwt.user')->middleware('verified');
    //Route::post('perfil', 'API\Auth\LoginController@perfil')->name('api.jwt.user');
    Route::post('perfil', 'API\UserController@perfil');
    Route::put('password/cambiar', 'API\UserController@cambiar_clave');
    Route::post('perfil/imagen/cargar', 'API\UserController@cambiar_imagen');
    Route::get('actualizar', 'API\Auth\LoginController@refresh')->name('api.jwt.refresh');
    Route::get('logout', 'API\Auth\LoginController@logout')->name('api.jwt.logout');

    Route::get('entradas', 'API\BlogController@index')->name('api.entradas');


    Route::get('dashboard/index', function () {
        return response()->json(['data' => 'Test Data']);
    });
    Route::post('entrada/guardar', 'API\BlogController@store')->middleware('role:admin');
});
