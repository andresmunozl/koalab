<?php

namespace App\Http\Controllers;

use App\Docent;
use App\Materia;
use App\Matricula;
use App\Oferta;
use App\OfertaMateria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $oferta = Oferta::where('tenantid','=',$user->tenantid)->with(['grupo','director'])->get();
        return response()->json(['results'=>$oferta]);
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
        //dd($request->all());
        $this->validate($request, [

            'group' => 'required|numeric|min:1',
            'start'=>'required',
            'end'=>'required',
            'journal'=>'required|numeric',
            'director_id'=>'required|numeric'
        ]);
        $user = Auth::user();
        $oferta = new Oferta();
        $oferta->name = ' ';
        $oferta->description = ' ';
        $oferta->start =  $request->start;
        $oferta->end = $request->end;
        $oferta->group = $request->group;
        $oferta->journal = $request->journal;
        $oferta->director_id = $request->director_id;
        $oferta->calendar ='A';
        $oferta->tenantid =$user->tenantid;
        $mientras = false;
        $code = '';
        while (!$mientras)
        {
            $code1 = Str::random(6);
            $ist = Oferta::where('code', '=', $code1)->get();
            if ($ist->isEmpty()) {
                $mientras= true;
                $code = $code1;
            }
        }
        $oferta->code =$code;
        if ($oferta->save()){
            return response()->json(['results'=>$code,'error'=>null]);

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
        //dd($id);
        $oferta = Oferta::where('id','=',$id)->with('grupo')->first();
        $matricula = Matricula::where('oferta_id','=',$oferta->id)->with('student')->get();
        $materiaoferta = OfertaMateria::where('oferta_id','=',$oferta->id)->with(['materia','docente'])->get();
        $materias = Materia::all();
        $docentes = Docent::with('user')->get();
        return response()->json(['results'=>$oferta,'matricula'=>$matricula,
            'materiaoferta'=>$materiaoferta,'materias'=> $materias,'docentes'=>$docentes]);
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
