<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Iluminate\Support\Facades\DB;
use App\Models\User;

class JwtAuth
{
    public function signup()
    {
        // Buscar si existe el usuario con sus credenciales
        // Comprobar si son correctas(objeto)
        // Generar el token con los datos del usuario identificado
        // Devolver los datos decodificados o el token, en funcion de un parametro

        return 'Metodo de la clase JWTAUTH';
    }
}