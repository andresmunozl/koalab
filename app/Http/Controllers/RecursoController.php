<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recurso;
use App\Actividad;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFounddation\Response;


class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $actividades = Actividad::all(); 
        $recursos = Recurso::with(['actividad'])->get();//where('tenantid','=',$user->tenantid)->
        
        return response()->json(['results'=>$recursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'descripcion' => 'required|string'
        ]);
        $user = Auth::user();
        $item = new Recurso();

        $item->nombre= $request->nombre;
        $item->descripcion= $request->descripcion;
        $item->estado= $request->estado;
        $item->user_id= $user->id;
        $item->actividad_id= $request->actividad_id;
        
        $item->tenantid= $user->tenantid;
        $miniatura= $request->file('miniatura');//probar con $request->miniatura

        if($miniatura){
            $miniatura_path = time().$miniatura->getClientOriginalName();
            \Storage::disk('images')->put($miniatura_path, \File::get($miniatura));

            $item->miniatura = $miniatura_path;
        }


        // hacer fomulario probar si sub iamgen

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
        $user = Auth::user();
        $actividades = Actividad::all(); 
        $recursos = Recurso::where('actividad_id','=',$id)->with(['actividad'])->get();//where('tenantid','=',$user->tenantid)->
        
        return response()->json(['results'=>$recursos]);
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
