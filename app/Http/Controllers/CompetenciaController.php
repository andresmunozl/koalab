<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competencia;
use App\Estandar;
use Illuminate\Support\Facades\Auth;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $estandares = Estandar::all();
        $competencias = Competencia::where('tenantid','=',$user->tenantid)->with(['estandar'])->get();
        
        return response()->json(['results'=>$competencias,'estandares',$estandares]);
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
        $user = Auth::user();
        $this->validate($request, [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        $item = new Competencia();

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->estandar_id = $request->estandar_id;
        // $item->competencia_id= $request->competencia_id;
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
        
        $competencias = Competencia::where('estandar_id','=',$id)->with(['estandar'])->get();
        $estandares = Estandar::all();
        return response()->json(['results'=>$competencias,'estandares',$estandares]);
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
        ]);
        $user = Auth::user();
        $item = Competencia::find($id);

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->estandar_id = $request->estandar_id;
        // $item->competencia_id= $request->competencia_id;
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
