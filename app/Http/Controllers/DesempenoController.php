<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desempeno;
use App\Tema;
use Illuminate\Support\Facades\Auth;

class DesempenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        $temas = Tema::all();
        $desempenos = Desempeno::where('tenantid','=',$user->tenantid)->with(['tema'])->get();
        
        return response()->json(['results'=>$desempenos,'competencias',$competencias]);
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
        $item = new Desempeno();

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
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
        $desempenos = Desempeno::with(['tema'])->where('tema_id','=',$id)->get();
        $temas = Tema::all();
        return response()->json(['results'=>$desempenos,'tema',$temas]);
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
        $item = Desempeno::find($id);

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->tema_id = $request->tema_id;
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
