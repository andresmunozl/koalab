<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programacion;
use App\Materia;
use App\Docent;
use Illuminate\Support\Facades\Auth;

class ProgramacionController extends Controller
{
    public function index(){
        $user = Auth::user();
        $programacion = Programacion::where('tenantid','=',$user->tenantid)->with(['materia','docente'])->get();
       return response()->json(['results'=>$programacion]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [

            'oferta_id' => 'required',
            'materia_id'=>'required',
            'docente_id'=>'required',
        ]);
        $user = Auth::user();

        $program = new Programacion();
        $program->oferta_id = $request->oferta_id;
        $program->materia_id = $request->materia_id;
        $program->docente_id = $request->docente_id;
        $program->tenantid = $user->tenantid;

        
        if($program->save()) {
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

    public function show($id)
    {
        $program = Programacion::where('programacion_id','=',$id)->with(['materia','docente'])->first();
        $materias = Materia::all();
        $docentes = Docent::with('user')->get();
        return response()->json(['results'=>$program,'materias'=> $materias,'docentes'=>$docentes]);
    }
}
