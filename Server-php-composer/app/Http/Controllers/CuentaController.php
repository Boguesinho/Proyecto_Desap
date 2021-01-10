<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CuentaController extends Controller
{
    public function create(Request $request){
        $rules = [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:cuentas',
            'telefono' => 'required|max:10',
            'genero' => 'required|string'
        ];
        $this->validate($request, $rules);

        $cuenta = new Cuenta();
        $cuenta->idUsuario = $request->user()->id;
        $cuenta->nombre = $request->input('nombre');
        $cuenta->apellidos = $request->input('apellidos');
        $cuenta->email = $request->input('email');
        $cuenta->telefono = $request->input('telefono');
        $cuenta->genero = $request->input('genero');
        $cuenta->info = $request->input('info');

        $cuenta->save(); //INSERT

        return response()->json([
            'message' => 'Cuenta creada con éxito'
        ]);
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
        //$cuenta->idUsuario = Auth::user()->id;
        $cuenta->idUsuario = $request->user()->id;
        $cuenta->nombre = $request->input('nombre');
        $cuenta->apellidos = $request->input('apellidos');
        $cuenta->email = $request->input('email');
        $cuenta->telefono = $request->input('telefono');
        $cuenta->genero = $request->input('genero');
        $cuenta->info = $request->input('info');
        $cuenta->save(); //UPDATE

        return response()->json([
            'message' => 'Cuenta editada con éxito'
        ]);
    }

        public function getCuenta (Request $request){
            $idUsuario = Usuario::find($request->user()->id);
            $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
            return response()->json($cuenta);
        }
}
