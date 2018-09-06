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

Route::get('/', function () {
    return view('base');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/logininto', function () {
    return view('user/login');
});
Route::get('/bamboologin', function () {
    return view('user/salogin');
});
Route::get('/home', function () {
    $user = Auth::user();
    switch ($user->rol) {
        case 'admin':
            return redirect('/a#/admin') ;
            break;
        case 'docent':
            return redirect('/d#/docent') ;
            break;
        case 'student'://modificar para is rutas, estudent.index
            return redirect('/s#/student') ;
            break;
        case 'parents':
            return redirect('p#/parents');
            break;
    }
});
//todo recordar quitar estas rutas y dejr solo lo personalizado
Auth::routes();

//Route::get('/d', 'HomeController@index')->name('home');
Route::get('/d', function () {
    $user = Auth::user();
    return view('docent.index')->with('user', $user);
});
route::post('/api/login', 'UserController@login');
route::post('/sa/api/login', 'UserController@sa');
//route::resource('/api/fiscalyear', 'AnioFiscalController');

route::resource('/s', 'StudentController');
route::resource('/a', 'AdminController');
route::resource('/p', 'ParentsController');
route::resource('/sa', 'SaController');


Route::get('/estudiantes', function () {
    return view('estudiante.estudiante');
});
route::resource('/api/estudiante','EstudianteController');

Route::get('/asistencia', function () {
    return view('asistencia.listaTodasAsistencias');
});

Route::get('/asistenciaE', function () {
    return view('asistencia.asistenciaEstudiante');
});

Route::get('/menuAsistencia', function () {
    return view('asistencia.index');
});

Route::get('/lista', function () {
    return view('asistencia.listaEstudiantes');
});
route::resource('/api/asistencia','AsistController');

Route::get('/materias', function () {
    return view('materia.listaTodasMaterias');
});
route::resource('/api/materia','MateriaController');

Route::get('/programacion', function () {
    return view('programacion.listaProgramacion');
});
route::resource('/api/programacion','ProgramacionController');

route::resource('/api/oferta','OfertaController');
route::resource('/api/group','GroupController');
route::resource('/api/materias','MateriasController');
route::resource('/api/docent','DocentController');
route::resource('/api/ofertamateria','OfertaMateriaController');
route::resource('/api/doc/ofertac','DocOfertaController');
route::resource('/api/matricula','MatriculaController');
route::resource('/api/student/clases','StudentClassController');
route::resource('/api/colleges','CollegeController');
route::resource('/api/desempeno','DesempenoController');
route::resource('/api/temas','TemaController');
route::resource('/api/actividades','ActividadController');
route::resource('/api/estandar','EstandarController');
route::resource('/api/competencia','CompetenciaController');
route::resource('/api/planeador','PlaneadorController'); 
route::resource('/api/recursos','RecursoController');
route::resource('/api/evaluarActividades','EvaluarActividad');
route::resource('/api/evaluacion','EvaluacionController');