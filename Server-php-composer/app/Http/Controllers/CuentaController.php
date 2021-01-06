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
        $rules = [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'telefono' => 'required|max:10',
            'genero' => 'required|string'
        ];
        $this->validate($request, $rules);

        $cuenta = new Cuenta();
        $cuenta->idUsuario = $request->user()->idUsuario;
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
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'telefono' => 'required|max:10',
            'genero' => 'required|string'
        ];
        $this->validate($request, $rules);

        //$cuenta->update($request->all());
        $cuenta->idUsuario = $request->user()->idUsuario;
        $cuenta->nombre = $request->input('nombre');
        $cuenta->apellidos = $request->input('apellidos');
        $cuenta->email = $request->input('email');
        $cuenta->telefono = $request->input('telefono');
        $cuenta->genero = $request->input('genero');
        $cuenta->info = $request->input('info');
        $cuenta->save(); //UPDATE

        return redirect()->route('cuenta', $cuenta);



    }
}
