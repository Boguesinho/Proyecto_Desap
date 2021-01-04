<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index(){
        $cuenta = Cuenta::all();
        return compact('cuenta');
    }

    public function create(Request $request){

        $cuenta = new Cuenta();
        $cuenta->nombre = $request->input('nombre');
        $cuenta->apellidos = $request->input('apellidos');
        $cuenta->email = $request->input('email');
        $cuenta->telefono = $request->input('telefono');
        $cuenta->genero = $request->input('genero');

        $cuenta->save(); //INSERT

        return redirect()->route('cuenta', $cuenta);
    }

    public function edit(Request $request, Cuenta $cuenta){
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        //$cuenta->update($request->all());
        $cuenta->nombre = $request->input('nombre');
        $cuenta->apellidos = $request->input('apellidos');
        $cuenta->email = $request->input('email');
        $cuenta->telefono = $request->input('telefono');
        $cuenta->genero = $request->input('genero');
        $cuenta->save(); //UPDATE

        return redirect()->route('cuenta', $cuenta);



    }
}
