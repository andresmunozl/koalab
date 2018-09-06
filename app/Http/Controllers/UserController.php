<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'lastname' => $data['lastname'],
            'document' => $data['document'],
            'rol' => 'admin',
            'phone' => $data['phone'],
        ]);
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
    public function login(Request $request)
{
    //dd($request->all());
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    $user = User::where('username','=',$request->username)->first();
    if ($user) {
        if (Hash::check($request->password, $user->password)) {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                // return redirect()->intended('dashboard');
                $user = Auth::user();
                if($user->rol != 'sa') {
                    return response()->json([
                        'error' => null,
                        'user' => $user->rol,
                        'ok' => 'Login Ok']);
                } else {
                    return response()->json([
                        'error' => 'Usuario o contraseña invalidos',
                        'ok' => null]);
                }
            }

        }
        else{
            return response()->json([
                'error' => 'Usuario o contraseña invalidos',
                'ok' => null]);
        }
    }
    else{
        return response()->json([
            'error' => 'Usuario o contraseña invalidos',
            'ok' => null]);
    }
}

    public function sa(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username','=',$request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $credentials = $request->only('username', 'password');

                if (Auth::attempt($credentials)) {
                    // Authentication passed...
                    // return redirect()->intended('dashboard');
                    $user = Auth::user();
                    if($user->rol == 'sa') {
                        return response()->json([
                            'error' => null,
                            'user' => $user->rol,
                            'ok' => 'Login Ok']);
                    } else {
                        return response()->json([
                            'error' => 'Usuario o contraseña invalidos',
                            'ok' => null]);
                    }
                }

            }
            else{
                return response()->json([
                    'error' => 'Usuario o contraseña invalidos',
                    'ok' => null]);
            }
        }
        else{
            return response()->json([
                'error' => 'Usuario o contraseña invalidos',
                'ok' => null]);
        }
    }
}
