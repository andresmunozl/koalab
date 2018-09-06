<?php

namespace App\Http\Controllers;

use App\OfertaMateria;
use App\Docent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfertaMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $docentes = Docent::all();
        $ofertaMateria = OfertaMateria::with(['materia','docente','oferta'])->get();//$user->id
        return response()->json(['results'=>$ofertaMateria]);
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
            'materia_id' => 'required|numeric',
            'docente_id' => 'required|numeric',
            'oferta_id' => 'required|numeric',
        ]);
        $user = Auth::user();

        $item = new OfertaMateria();

        $item->materia_id= $request->materia_id;
        $item->docente_id= $request->docente_id;
        $item->oferta_id= $request->oferta_id;
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
        $docentes = Docent::with('user')->get();
        $ofertaMateria = OfertaMateria::where('tenantid','=',$user->tenantid)->with(['materia','docente','oferta'])->get();//->where(Auth::user()->id,'=',$docentes.id)
        
        return response()->json(['results'=>$ofertaMateria,'docentes'=>$docentes]);
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
