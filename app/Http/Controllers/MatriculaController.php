<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Oferta;
use Illuminate\Http\Request;
use App\Matricula;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Auth;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $matricula = Matricula:: where('tenantid','=',$user->tenantid)->get();
        return response()->json(['results'=>$matricula]);
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

            'code' => 'required',

        ]);
        $user = Auth::user();
        //dd($user);

        $student = Estudiante::where('user_id', '=', $user->id)->first();
        $oferta = Oferta::where('code','=',$request->code)->first();
        if ($oferta) {
            //dd($oferta);
            $matricula = Matricula::where('student_id','=',$student->id)->where('oferta_id','=',$oferta->id)->first();
            if ($matricula) {
                return response()->json(['results'=>null,'error'=>'Ya esta asociado']);
            } else {
                $item = new Matricula();
                $item->fecha= new \DateTime();
                $item->oferta_id= $oferta->id;
                $item->student_id= $student->id;
                $item->estado =  1;
                $item->tenantid =  $user->tenantid;
                $item->save();
                return response()->json(['results'=>2,'error'=>null]);

            }
        } else {
            return response()->json(['results'=>1,'error'=>null]);

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
        $matricula = Matricula::where('oferta_id',$id)->with(['oferta','student'])->get();
        return response()->json(['results'=>$matricula]);
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
