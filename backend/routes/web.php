<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes(['verify'=>true]);

//Route::get('email/verify', 'API\Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}', 'API\Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'API\Auth\VerificationController@resend')->name('verification.resend');

Route::get('profile', function(){})->middleware('verified');
    //Solo los usuarios verificados pueden entrar


Route::get('/', 'HomeController@index')->name('index.home');
Route::get('/blog', 'HomeController@index')->name('index.blog');
Route::get('/contacto','HomeController@index')->name('index.contacto');

//Route::get('/api/entradas','BlogController@index')->name('api.entradas');
/* Route::post('/api/entradas','BlogController@store');
Route::delete('/api/entrada/{id}','BlogController@destroy');
Route::get('/api/entradas/{id}','BlogController@show')->name('api.entradas.show');
Route::post('/api/entradas/{id}','BlogController@update'); */




//Route::get('api/entradas_table','AdminController@entradas');

Route::get('/login','HomeController@index')->name('index.login');
//Route::post('/dashboard')->name('login');
//Auth::routes();



Route::post('/logout','Auth\LoginController@logout')->name('logout');
/*Route::get('/login', function(){
	return 'Hola mundo';
});*/

Route::get('/register','HomeController@index')->name('index.login');
//Route::get('/register', 'HomeController@index');
//Route::get('/register','Auth\RegisterController@showRegistrationForm');
//Route::post('/register','Auth\RegisterController@register')->name('register');
//Route::get('/email/resend','Auth\VerificationController@resend')->name('verification.resend');
//Route::get('/email/verify','Auth\VerificationController@show')->name('verification.notice');
//Route::get('/email/verify/{id}','Auth\VerificationController@verify')->name('verification.verify');

Route::get('restaurar_clave','HomeController@index');
//Route::get('/restaurar_clave/{token}','AuthController@show_reset');
//Route::post('/restaurar_clave/password','AuthController@callResetPassword');






//Route::post('reset-password','AuthController@sendPasswordResetLink');

//Route::get('/entradas/{id}','HomeController@index')->name('home');
//Route::get('/perfil','HomeController@index')->name('home');

Route::group(['middleware' => ['cors']], function(){

	//Route::post('/login/index','Auth\LoginController@postLogin');

	/*Route::post('/login','Auth\LoginController@login')->middleware('auth', 'role:admin');*/

    /* Route::get('api/perfil','UsuariosController@perfil');
	Route::post('api/perfil','UsuariosController@cambiar_imagen');
	Route::put('api/perfil','UsuariosController@cambiar_clave');

	Route::get('/api/roles','UsuariosController@cargar_roles');
	Route::put('/api/rol/{id}','UsuariosController@actualizar_rol'); */

	/* Route::post('api/test','BlogController@test'); */

	/* Route::get('/api/usuarios','UsuariosController@table');
	Route::post('/api/usuarios','UsuariosController@store');
	Route::put('api/usuarios','UsuariosController@update'); */


	/* Route::get('/api/entradas','BlogController@index')->name('api.entradas');
	Route::post('/api/entradas','BlogController@store');
	Route::delete('/api/entrada/{id}','BlogController@destroy');
	Route::get('/api/entradas/{id}','BlogController@show')->name('api.entradas.show');
	Route::post('/api/entradas/{id}','BlogController@update'); */

	//Route::post('/logout','Auth\LoginController@logout')->name('logout');


	//Route::get('api/entradas_table','AdminController@entradas');

	/* Route::post('api/comentario','ComentarioController@comentar');
	Route::get('api/comentarios','ComentarioController@listar');
	Route::get('api/comentarios/{id}','ComentarioController@comentarios_entrada');
	Route::put('api/comentario/update','ComentarioController@actualizar'); */
});


/*Route::prefix('admin')->group(function(){

	Route::get('/login','AdminController@showLogin')->name('admin.login');
	Route::post('/login','AdminController@login')->name('admin.post-login');

	Route::get('/','AdminController@index')->name('admin');
	Route::get('/cambiar_credenciales','AdminController@index')->name('admin');
	Route::get('/usuarios','AdminController@index')->name('admin');
	Route::get('/entradas','AdminController@index')->name('admin');
	Route::get('/nueva_entrada','AdminController@index')->name('admin');
	Route::get('/editar_entrada/{id}','AdminController@index')->name('admin');
	Route::get('/comentarios','AdminController@index')->name('admin');
	Route::get('/agregar_usuario','AdminController@index')->name('admin');


}); */



//Auth::routes(['verify' => true]);
