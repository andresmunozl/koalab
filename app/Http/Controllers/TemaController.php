<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\Competencia;
use Illuminate\Support\Facades\Auth;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $temas = Tema::where('tenantid','=',$user->tenantid)->with(['competencia'])->get();//Tema::all();//Tema::with('subtema')->get()
        
        $competencias = Competencia::all();
        return response()->json(['results'=>$temas,'competencias',$competencias]);
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
        $item = new Tema();

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->subtema = 1;//$request->subtema;//1;
        $item->competencia_id = $request->competencia_id;
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
        
        $tema = Tema::where('competencia_id','=',$id)->with('competencia')->get();
        $competencias = Competencia::all();
        // $subtemas = Tema::with('subtema')->get();
        return response()->json(['results'=>$tema,'competencias',$competencias]);
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
        $item = Tema::find($id);

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->subtema = $request->subtema;
        $item->tenantid= $user->tenantid;
        // $item->competencia_id= $request->competencia_id;
        

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
