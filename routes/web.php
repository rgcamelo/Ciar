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
Route::post('descargarziplibro/{ruta}','Descargar@comprimirDescargarLibro')->name('comprimirDescargarlibro');

Route::get ('nuevaconvocatoria', "ConvocatoriaController@nuevo")->name('convocatoria.nuevo');
Route::get ('laconvocatoria', "ConvocatoriaController@convocatoria")->name('convocatoria.convocatoria');
Route::post('convocatoria', "ConvocatoriaController@crear");
Route::post('cerrarconvocatoria/{convocatoria}', "ConvocatoriaController@cerrar");

Route::post('enviarpares/{solicitud}', "SolicitudController@pares");
Route::post('cancelar/{solicitud}', "SolicitudController@cancelar");
Route::post('reclamar/{solicitud}/{productividad}', "ReclamoController@reclamar");
Route::post('calificar/{solicitud}', "SolicitudController@calificar");
Route::post('calificarbonificacion/{solicitud}', "SolicitudController@calificarbonificacion");
Route::post('calificarparessoft/{solicitud}/{software}', "SolicitudController@calificarparessoft");
Route::post('calificarpareslibro/{solicitud}/{libro}', "SolicitudController@calificarpareslibro");
Route::post('reprobar/{solicitud}', "SolicitudController@reprobar");

Route::post('aceptarreclamo/{reclamo}', "ReclamoController@aprobar");
Route::post('aceptarreclamobonificacion/{reclamo}', "ReclamoController@aprobarbonificacion");
Route::post('rechazarreclamo/{reclamo}', "ReclamoController@rechazar");


Route::get('solicitudes','DashboardController@solicitudes')->name('solicitudes');
Route::get('reclamos','DashboardController@reclamos')->name('reclamos');
Route::get('registros','DashboardController@registros')->name('registros');
Route::get('revisarreclamos','DashboardController@revisarreclamos')->name('revisarreclamos');
Route::get('revisarsolicitudes','DashboardController@solicitudes2')->name('revisarsolicitudes');
Route::get('productividad','DashboardController@productividades')->name('productividades');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/Docente/{docente}',"DocenteController@consultar")->name('docente.consultar');
Route::post('/Docente/{docente}/seleccionarproductividad',"ProductividadController@seleccionar")->name('productividad.seleccionar');

Route::get('software',"SoftwareController@nuevo")->name('software.nuevo');
Route::get('libro',"LibroController@nuevo")->name('libro.nuevo');
Route::get('articulo',"ArticuloController@nuevo")->name('articulo.nuevo');
Route::get('ponencia',"PonenciaController@nuevo")->name('ponencia.nuevo');
Route::get('video',"VideoController@nuevo")->name('video.nuevo');
Route::get('premiosnacionales',"PremiosnacionalesController@nuevo")->name('premiosnacionales.nuevo');
Route::get('patente',"PatenteController@nuevo")->name('patente.nuevo');
Route::get('traduccion',"TraduccionController@nuevo")->name('traduccion.nuevo');
Route::get('obra',"ObraController@nuevo")->name('obra.nuevo');
Route::get('produccionTecnica',"ProduccionTecnicaController@nuevo")->name('producciontecnica.nuevo');
Route::get('estudiosPostdoctorales',"EstudiosPostdoctoralesController@nuevo")->name('estudiosPostdoctorales.nuevo');
Route::get('publicacionImpresa',"PublicacionImpresaController@nuevo")->name('publicacionImpresa.nuevo');
Route::get('reseñasCriticas',"ReseñasCriticasController@nuevo")->name('reseñasCriticas.nuevo');
Route::get('direccionTesis',"DireccionTesisController@nuevo")->name('direccionTesis.nuevo');


Route::post('/articulo',"ArticuloController@crear");
Route::post('/software',"SoftwareController@crear");
Route::post('/libro',"LibroController@crear");
Route::post('/ponencia',"PonenciaController@crear");
Route::post('/video',"VideoController@crear");
Route::post('/premiosnacionales',"PremiosnacionalesController@crear");
Route::post('/patente',"PatenteController@crear");
Route::post('/traduccion',"TraduccionController@crear");
Route::post('/obra',"ObraController@crear");
Route::post('/produccionTecnica',"ProduccionTecnicaController@crear");
Route::post('/estudiosPostdoctorales',"EstudiosPostdoctoralesController@crear");
Route::post('/publicacionImpresa',"PublicacionImpresaController@crear");
Route::post('/reseñasCriticas',"ReseñasCriticasController@crear");
Route::post('/direccionTesis',"DireccionTesisController@crear");

Route::get('/descargar/{archivo}',"Descargar@descarga");
Route::post('bajaracta/{convocatoria}',"pdfController@acta");
Route::post('aprobadas/{convocatoria}',"pdfController@aprobadas");
Route::post('noaprobadas/{convocatoria}',"pdfController@reprobadas");
