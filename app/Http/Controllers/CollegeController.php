<?php

namespace App\Http\Controllers;

use App\College;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $college = College::all();
        return response()->json(['results'=>$college]);
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
        $this->validate($request, [

            'nombre' => 'required|min:1',
            'dane'=>'required|unique:colleges,dane',
            'telefono'=>'required',
            'direccion'=>'required',
            'sector'=>'required'
        ]);
        $colegio = new College();
        $colegio->nombre = $request->nombre;
        $colegio->dane = $request->dane;
        $colegio->telefono = $request->telefono;
        $colegio->direccion = $request->direccion;
        $colegio->sector = $request->sector;
        $colegio->email = $request->email;
        $colegio->website = $request->website;
        $colegio->state = true;
        $colegio->tipo = 1;
        $colegio->calendario = $request->calendario;
        $colegio->tenantid = Hash::make($request->dane);
        $colegio->save();
        $user = new User();
        $user->name = $request->nombre;
        $user->lastname = 'c';
        $user->document =$request->dane;
        $user->email ='bamboo@bamboo.com';
        $user->password = Hash::make('bambooclass');
        $user->tenantid = $colegio->tenantid;
        $user->college = $colegio->id;
        $user->phone = 'NULL';
        $user->rol = 'admin';
        $user->genre = 'M';
        $user->username = $request->dane;

        if ($user->save()){
            return response()->json(['results'=>$user,'error'=>null]);

        } else {
            return response()->json(['results'=>null,'error'=>'Ocurrió un error']);

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $college = College::where('id','=',$id)->get();
        return response()->json(['results'=>$college]);
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
