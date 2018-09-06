<?php

namespace App\Http\Controllers;

use App\Materia;
use App\MateriaYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $user = Auth::user();

        //aqui deberia filtrar por año e isntitución id
        $materia = Materia:: where('tenantid','=',$user->tenantid)->get();
        return response()->json(['results'=>$materia]);
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
            'name' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
        ]);
        $user = Auth::user();
        $materia = new Materia();
        $materia->name = $request->name;
        $materia->descripcion = $request->descripcion;
        $materia->colegio_id = 1;
        $materia->tenantid = $user->tenantid;
        $materia->save();

        $materiaYear = new MateriaYear();
        $materiaYear->academic_year_id =1;
        $materiaYear->materia_id =$materia->materia_id;
        $materiaYear->state =true;
        $materiaYear->tenantid =$user->tenantid;
        $materiaYear->save();
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
            'name' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
        ]);
        $materia = Materia::find($id);
        $materia->name = $request->name;
        $materia->descripcion = $request->descripcion;
        $materia->save();

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
