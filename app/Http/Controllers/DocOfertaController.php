<?php

namespace App\Http\Controllers;

use App\Docent;
use App\Materia;
use App\OfertaMateria;
use App\Planeador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocOfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $doc = Docent::where('user_id','=',$user->id)->first();
        $oferta = OfertaMateria::where('docente_id','=',$doc->id)->where('tenantid','=',$user->tenantid)->with(['materia','oferta'])->get();
        return response()->json(['results'=>$oferta]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // dd("entra aqueee");
        $user = Auth::user();
        $doc = Docent::where('user_id','=',$user->id)->first();
        $planeadors = Planeador::where('tenantid', '=', $user->tenantid)->where('materia_id', '=', $id)->get();
        $materia = Materia::where('materia_id', '=', $id)->first();
        return response()->json(['results'=>$planeadors,'materia'=>$materia]);
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
