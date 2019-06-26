<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Descargar;

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

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('solicitudes','DashboardController@solicitudes')->name('solicitudes');
Route::get('productividad','DashboardController@productividades')->name('productividades');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/Docente/{docente}',"DocenteController@consultar")->name('docente.consultar');
Route::post('/Docente/{docente}/seleccionarproductividad',"ProductividadController@seleccionar")->name('productividad.seleccionar');
Route::get('software',"SoftwareController@nuevo")->name('software.nuevo');
Route::post('/software',"SoftwareController@crear");
Route::get('/descargar/{archivo}',"Descargar@descarga");

