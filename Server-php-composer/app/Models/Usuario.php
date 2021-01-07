<?php

    namespace App\Models;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    use Tymon\JWTAuth\Contracts\JWTSubject;


    class Usuario extends Authenticatable implements JWTSubject
    {
        use Notifiable;

        protected $fillable = [
            'username', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function getJWTIdentifier()
        {
            return $this->getKey();
        }
        public function getJWTCustomClaims()
        {
            return [];
        }
    }
