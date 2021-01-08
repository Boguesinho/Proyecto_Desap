<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $idUsuario;

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function multimedia(){
        return $this->belongsTo(Multimedia::class, 'idMultimedia');
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class, 'idPost');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'idPost');
    }
}
