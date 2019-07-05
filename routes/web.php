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

Route::post('descargarzip/{ruta}','Descargar@comprimirDescargar')->name('comprimirDescargar');
Route::post('descargarziparticulo/{ruta}','Descargar@comprimirDescargarArticulo')->name('comprimirDescargararticulo');
Route::post('descargarzipponencia/{ruta}','Descargar@comprimirDescargarPonencia')->name('comprimirDescargarPonencia');


Route::post('enviarpares/{solicitud}', "SolicitudController@pares");
Route::post('calificar/{solicitud}', "SolicitudController@calificar");
Route::post('calificarparessoft/{solicitud}/{software}', "SolicitudController@calificarparessoft");
Route::post('calificarpareslibro/{solicitud}/{libro}', "SolicitudController@calificarpareslibro");
Route::post('reprobar/{solicitud}', "SolicitudController@reprobar");



Route::get('solicitudes','DashboardController@solicitudes')->name('solicitudes');
Route::get('revisarsolicitudes','DashboardController@solicitudes2')->name('revisarsolicitudes');
Route::get('productividad','DashboardController@productividades')->name('productividades');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/Docente/{docente}',"DocenteController@consultar")->name('docente.consultar');
Route::post('/Docente/{docente}/seleccionarproductividad',"ProductividadController@seleccionar")->name('productividad.seleccionar');

Route::get('software',"SoftwareController@nuevo")->name('software.nuevo');
Route::get('libro',"LibroController@nuevo")->name('libro.nuevo');
Route::get('articulo',"ArticuloController@nuevo")->name('articulo.nuevo');
Route::get('ponencia',"PonenciaController@nuevo")->name('ponencia.nuevo');

Route::post('/articulo',"ArticuloController@crear");
Route::post('/software',"SoftwareController@crear");
Route::post('/libro',"LibroController@crear");
Route::post('/ponencia',"PonenciaController@crear");

Route::get('/descargar/{archivo}',"Descargar@descarga");

