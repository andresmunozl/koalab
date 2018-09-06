<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Planeador;
use App\Docent;
use App\Materia;
use Illuminate\Support\Facades\Auth;

class PlaneadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //'codigo_dane','docente_id','fecha_inicio','fecha_fin','horas','sesiones','colegio_id','materia_id','tenantid'
         $user = Auth::user();

        $planeadores = Planeador::where('tenantid','=',$user->tenantid)->with(['docente','materia'])->get();
        // $docentes = Docent::all();
        // $materias = Materia::all();
        return response()->json(['results'=>$planeadores/*,'docentes'=>$docentes,'materias',$materias*/]);
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
    //    dd($request->all());
        $this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'horas' => 'required|numeric',
            'sesiones' => 'required|numeric',
            'materia_id' => 'required|numeric'
        ]);

        $user = Auth::user();
        $doc = Docent::where('user_id','=',$user->id)->first();
        $item = new Planeador();
       // $item->codigo_dane= 'NN';
        $item->docente_id= $doc->id;
        $item->fecha_inicio=$request->fecha_inicio;
        $item->fecha_fin= $request->fecha_fin;
        $item->horas = $request->horas;
        $item->sesiones = $request->sesiones;
        $item->materia_id= $request->materia_id;
      //  $item->tenantid= $user->tenantid;
        $item->save();
        return response()->json(['results'=>'Guardado ok','error'=>null]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $this->validate($request, [
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'horas' => 'required|numeric',
            'sesiones' => 'required|numeric'
        ]);
           
        $user = Auth::user();
        $item = Planeador::find($id);

        $item->codigo_dane= $request->codigo_dane;
        $item->docente_id= $request->docente_id;
        $item->fecha_inicio= $request->fecha_inicio;
        $item->fecha_fin= $request->fecha_fin;
        $item->horas = $request->horas;
        $item->sesiones = $request->sesiones;
        $item->colegio_id= $request->colegio_id;
        $item->materia_id= $request->materia_id;
        $item->tenantid= $user->tenantid;
        

        $item->save();
        return response()->json(['results'=>'Guardado ok','error'=>null]);
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
