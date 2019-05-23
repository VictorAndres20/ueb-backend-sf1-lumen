<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function login(Request $request)
    {
        /** Validate inpits */
        $this->validate($request, [
            //'email'    => 'required|email|max:255', use this if you are loggin by email
            'login' => 'required',
            'pass' => 'required',
        ]);

        try {
            /** Encrypt pass with your method */
            $pass=md5($request->input('pass'));
            $data=
            [
                /** Column on DB login_user */
                "correo_usuario"=>$request->input('login'),
                /** Column on DB pass_user */
                "clave_usuario"=>$pass
            ];
            //return $data;
            if (! $token = $this->jwt->attempt($data))
            {
                return response()->json(['success'=>false,'message'=>'Credenciales incorrectas'], 200);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['success'=>false,'message'=>'token_expired'], 200);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['success'=>false,'message'=>'token_invalid'], 200);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['success'=>false,'message'=>'Error fatal','token_absent' => $e->getMessage()], 200);

        }
        $usuario=$this->jwt->user();
        if($usuario->cod_estado!=1)
        {
            return response()->json(['success'=>false,'message'=>'Usuario no ha sido contratado'], 200);
        }
        return response()->json(['success'=>true,'message'=>$usuario,'token'=>$token],200);
    }
}
