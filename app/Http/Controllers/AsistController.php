<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Estudiante;
use Faker\Provider\DateTime;

class AsistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $asistencia = Asistencia::all();
        return response()->json(['results'=>$asistencia]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //print_r($request->all());
        foreach ($request->all() as $item) {
            $asistencia = new Asistencia();
            print_r($item);

            $asistencia->observacion_asistencia = $item['asistencia'][('observacion_asistencia')]/*$item->asist.observacion_asistencia*/;
            $asistencia->tipo_asistencia = $item['asistencia'][('tipo_asistencia')];
            $asistencia->fecha_asistencia = new \DateTime();
            $asistencia->estudiante_id = $item['student'][('id')];
            $asistencia->programacion_id = $item['oferta_id'];//revisar mejor... progfamacion es lo mismo que ofertamateria
            $asistencia->save();
        }

        

        //guardar
            return response()->json([
                'error' => null,
                'ok' => 'Guardado exitosamente'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::with(['estudiante','programacion'])->where('estudiante_id',$id)->get();
        $estudiantes = Estudiante::with('user')->get();
        return response()->json(['results'=>$asistencia,'estudiantes'=>$estudiantes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
