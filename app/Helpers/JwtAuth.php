<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JwtAuth
{

    protected $key;

    public function __construct()
    {
        $this->key = 'esto_es_una_clave_super_secreta-99887766';
    }

    public function signup($email, $password, $getToken = null)
    {
        // Buscar si existe el usuario con sus credenciales
        $user = User::where('email', $email)->first();

        // Comprobar si el usuario existe y la contraseña coincide
        if (!$user || !password_verify($password, $user->password)) {
            return [
                'status' => 'error',
                'message' => 'Credenciales incorrectas.'
            ];
        }

        // Generar el token con los datos del usuario identificado
        $token = [
            'sub'       =>  $user->id,
            'email'     =>  $user->email,
            'name'      =>  $user->name,
            'surname'   =>  $user->surname,
            'iat'       =>  time(),
            'exp'       =>  time() + (7 * 24 * 60 * 60)
        ];

        $jwt = JWT::encode($token, $this->key, 'HS256');

        // Devolver los datos decodificados o el token, en función de un parámetro
        if ($getToken === true) {
            $decoded = JWT::decode($jwt, $this->key, ['HS256']);
            return $decoded;
        } else {
            return $jwt;
        }
    }
}