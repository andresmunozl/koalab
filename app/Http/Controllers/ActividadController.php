<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\Tema;
use App\Desempeno;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $actividades = Actividad::where('tenantid','=',$user->tenantid)->with('desempeno')->get();
        // $temas = Tema::all();
        $desempenos = Desempeno::all();
        return response()->json(['results'=>$actividades,'desempenos'=>$desempenos]);
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
        $this->validate($request, [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'tipo' => 'required|numeric'
        ]);
        $user = Auth::user();
        $item = new Actividad();

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->tipo= $request->tipo;
        $item->desempeno_id= $request->desempeno_id;
        $item->tema_id = $request->tema_id;
        $item->tenantid= $user->tenantid;
        

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
        $actividades = Actividad::where('desempeno_id',$id)->with(['desempeno'])->get();
        // $temas = Tema::all();
        $desempenos = Desempeno::all();
        return response()->json(['results'=>$actividades,'desempenos'=>$desempenos]);
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
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'tipo' => 'required|numeric'
        ]);
        $user = Auth::user();
        $item = Actividad::find($id);

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->tipo= $request->tipo;
        $item->desempeno_id= $request->desempeno_id;
        $item->tema_id = $request->tema_id;
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
