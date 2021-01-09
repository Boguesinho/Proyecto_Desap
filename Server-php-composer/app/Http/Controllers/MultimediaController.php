<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use function Symfony\Component\String\u;

class MultimediaController extends Controller
{
    public function subirFotoPerfil(Request $request){
        $rules = [
            'ruta'=>'required|image'
        ];
        $this->validate($request, $rules);

        if ($request->hasFile("ruta")) {
            $multimedia = new Multimedia();
            $multimedia->ruta = $request->file('ruta')->store();

            $idUsuario = $request->user()->id;
            $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
            $cuenta->idMultimedia = $multimedia->id;

            $multimedia->save();
            $cuenta->save();

        }
    }



}
