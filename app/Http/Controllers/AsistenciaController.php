<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Estudiante;
use App\Programacion;

class AsistenciaController extends Controller
{
    public function index(){

        $asistencia = Asistencia::with('programacion','estudiante')->get();
       return response()->json(['results'=>$asistencia]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'asistencia_id' => 'required|string|max:255',
            //'estudiante_id' => 'required',
            //'programacion_id' => 'required|string|min:2',
            'tipo_asistencia'=>'required',
            'observacion_asistencia' => 'required',
            //'fecha_asistencia' => 'required'
        ]);

        //objetos de las foraneas
        $estudiante  = Estudiante::create([
            'padre_id' => $request['padre_id'],
            'madre_id' => $request['madre_id'],
            'user_id' => $request['user_id'],
            'photo' => $request['photo'],
            
        ]);

        $programacion  = Programacion::create([
            'oferta_id' => $request['oferta_id'],
            'materia_id' => $request['materia_id'],
            'docente_id' => $request['docente_id'],
        ]);
        
        $asistencia = new Asistencia();
        
        $asistencia->observacion_asistencia = 'obs as';
        $asistencia->tipo_asistencia = $request->tipo_asistencia;
        $asistencia->fecha_asistencia = new \DataTime();
        $asistencia->estudiante_id = $estudiante->id;
        $asistencia->programacion_id = $programacion->programacion_id;

        //guardar
        if($asistencia->save()) {
            return response()->json([
                'error' => null,
                'ok' => 'Guardado exitosamente'
            ]);
        } else {
            return response()->json([
                'error' => 'Ocurrio un error',
                'ok' => null
            ]);
        }
    }
}
