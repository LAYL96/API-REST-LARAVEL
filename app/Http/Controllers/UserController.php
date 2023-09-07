<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        
        // Recoger los datos del usuario por post
        $json = $request->input('json', null);
        $params = json_decode($json); // objeto
        $params_array = json_decode($json, true); // array

        // Validar datos

        // Cifrar la contraseña

        // Comprobar si el usuario ya existe (duplicado)

        // Crear el usuario

        $data = array(
            'status' => 'error',
            'code' => '404',
            'message' => 'El usuario no se ha creado'
        );

        return response()->json($data, $data['code']);
    }

    public function login(Request $request){

    }
}
