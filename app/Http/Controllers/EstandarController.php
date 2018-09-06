<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estandar;
use App\Planeador;
use Illuminate\Support\Facades\Auth;

class EstandarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $estandares = Estandar::where('tenantid','=',$user->tenantid)->get();
        return response()->json(['results'=>$estandares]);
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
        ]);
        $user = Auth::user();
        $item = new Estandar();

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->planeador_id = $request->planeador_id;
        $item->tenantid= $user->tenantid;
        // $item->competencia_id= $request->competencia_id;
        

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
        // dd($id);
        $user = Auth::user();
        $planeadores = Planeador::all();
        $estandares = Estandar::where('planeador_id','=',$id)->get();
        return response()->json(['results'=>$estandares]);
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
        $item = Estandar::find($id);

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->planeador_id = 1;
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
