<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Usuario;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class FollowerController extends Controller
{

    public function getSeguidores(Request $request){
        $seguidores = Usuario::find($request->user()->id);
        return $seguidores->seguidores;

    }
    public function getSeguidos(Request $request){
        $seguidos = Usuario::find($request->user()->id);
        return $seguidos->seguidos;
    }

    public function seguirUsuario(Request $request, int $idSeguido){
        $usuario = Usuario::find($request->user()->id);
        $seguido = new Follower();
        $seguido->idSeguidor = $usuario;
        $seguido->idSeguido = $idSeguido;
        $seguido->save();

        return response()->json([
            'message' => 'Usuario seguido con éxito'
        ]);
    }

    public function unfollowUsuario(Request $request, int $idSeguido){
        $idUsuario = Usuario::find($request->user()->id);
        $seguido = Follower::where('idSeguido', $idSeguido)->where('idSeguidor', $idUsuario)->delete();
        return response()->json([
            'message' => 'Dejaste de seguir al usuario con éxito'
        ]);
    }

}
