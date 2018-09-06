<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Estudiante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $estudiantes = Estudiante::where('tenantid','=',$user->tenantid)->with('user')->get();
       return response()->json(['results'=>$estudiantes]);
      // $estudiante = Estudiante::with('user')->first();

       //return compact('estudiantes','estudiante');

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'document'=>'required|numeric|unique:users,document',
            'rol' => 'required'
        ]);
        $user = Auth::user();

        $user  = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'rol' => $request['rol'],
            'password' => Hash::make($request['password']),
            'lastname' => $request['lastname'],
            'document' => $request['document'],
            'phone' => $request['phone'],
            'tenantid' => $user->tenantid,
        ]);
        $student = new Estudiante();
        $student->padre_id = 1;
        $student->madre_id = 1;
        $student->user_id = $user->id;
        $student->photo = 'null';
        $student->tenantid = $user->tenantid;
        if($student->save()) {
            return response()->json([
                'error' => null,
                'ok' => 'Guardado exitosamente'
            ]);
        } else {
            return response()->json([
                'error' => 'Ocurrio un error',
                'ok' => null
            ]);
        }

        //dd("holaaa entra aqui");
        /*
         *   'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rol' => 'required',*/
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'document'=>'required|numeric',
            'rol' => 'required'
        ]);
        $student = Estudiante::where('id','=',$id)->with('user')->first();
        $user = $student->user;
        $user->name = $request['name'];
        $user->save();
        $student->padre_id = 1;
        $student->madre_id = 1;
        $student->user_id = $user->id;
        $student->photo = 'null';
        if($student->save()) {
            return response()->json([
                'error' => null,
                'ok' => 'Guardado exitosamente'
            ]);
        } else {
            return response()->json([
                'error' => 'Ocurrio un error',
                'ok' => null
            ]);
        }
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
