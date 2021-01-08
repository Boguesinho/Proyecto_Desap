<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    public function subirFotoPerfil(Request $request, $idCuenta){
        $rules = [
            'ruta'=>'required|image'
        ];
        $this->validate($request, $rules);

        if ($request->hasFile("ruta")) {
            $multimedia = new Multimedia();
            $multimedia->ruta = $request->file('ruta')->store();

            $cuenta = $idCuenta;
            $cuenta->idMultimedia = $multimedia->id;

            $multimedia->save();
            $cuenta->save();

        }
    }



}
