<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;
use App\PrestacionServicios;


class UsuarioController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Method PUT
     */
    public function create(Request $request)
    {
        $res=['message'=>'Error fatal','success'=>false];
        try
        {
            $usuario=new Usuario;
            $usuario->nombre_usuario=$request->nombre_usuario;
            $usuario->apellido_usuario=$request->apellido_usuario;
            $usuario->correo_usuario=$request->correo_usuario;
            $usuario->clave_usuario=md5($request->clave_usuario);
            $usuario->cod_rol=$request->cod_rol;
            $usuario->cod_estado=$request->cod_estado;
            $usuario->save();
            $prestacion=PrestacionServicios::find(1);
            Usuario::find($usuario->cod_usuario)->prestaciones()->save($prestacion);
            $res['message']='Usuario creado con éxito';
            $res['success']=true;
            return response()->json($res,201);
        }
        catch(\Exception $e)
        {
            $res['message']='FATAL ERROR: '.$e;
            return response()->json($res,500);
        }
    }

    /**
     * Method PUT
     */
    public function addPrestacion(Request $request)
    {
        $res=['message'=>'Error fatal','success'=>false];
        try
        {
            $prestacion=PrestacionServicios::find($request->cod_prestacion);
            Usuario::find($request->cod_usuario)->prestaciones()->save($prestacion);
            $res['message']='Prestación agregada con éxito';
            $res['success']=true;
            return response()->json($res,201);
        }
        catch(Exception $e)
        {
            $res['message']='FATAL ERROR: '.$e;
            return response()->json($res,500);
        }
    }

    /**
     * Method POST
     */
    public function update(Request $request)
    {
        $res=['message'=>'Error fatal','success'=>false];
        try
        {
            $usuario=Usuario::with('estado')->with('rol.permisos')->with('rol.departamento')->with('prestaciones')->find($request->cod_usuario);
            $usuario->nombre_usuario=$request->nombre_usuario;
            $usuario->apellido_usuario=$request->apellido_usuario;
            $usuario->correo_usuario=$request->correo_usuario;
            $usuario->cod_rol=$request->cod_rol;
            $usuario->cod_estado=$request->cod_estado;
            $usuario->save();
            $res['message']=$usuario;
            $res['success']=true;
            return response()->json($res,201);
        }
        catch(Exception $e)
        {
            $res['message']='FATAL ERROR: '.$e;
            return response()->json($res,500);
        }
    }

    /**
     * Method GET
     */
    public function updateBlock($cod_usuario)
    {
        $res=['message'=>'Error fatal','success'=>false];
        try
        {
            $usuario=Usuario::find($cod_usuario);
            $usuario->cod_estado=5;
            $usuario->save();
            $res['message']='El usuario ha sido bloqueado';
            $res['success']=true;
            return response()->json($res,201);
        }
        catch(Exception $e)
        {
            $res['message']='FATAL ERROR: '.$e;
            return response()->json($res,500);
        }
    }

    /**
     * Method GET
     */
    public function list()
    {
        $res=['message'=>Usuario::with('estado')->with('rol.permisos')->with('rol.departamento')->with('prestaciones')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function paginate($page)
    {
        $res=['message'=>Usuario::with('estado')->with('rol.permisos')->with('rol.departamento')->with('prestaciones')->skip(0)->take(10)->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function nomina()
    {
        $res=['message'=>Usuario::getValoresTotales(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function nominaUser($cod_usuario)
    {
        $res=['message'=>Usuario::with('prestaciones')->find($cod_usuario),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listById($cod_usuario)
    {
        $usuario=Usuario::with('estado')->with('rol.permisos')->with('rol.departamento')->with('prestaciones')->find($cod_usuario);
        $res=['message'=>$usuario,'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listRoutes($cod_usuario)
    {
        $usuario=Usuario::with('rol.permisos')->find($cod_usuario);
        $res=['message'=>$usuario->rol->permisos,'success'=>true];
        return response()->json($res,200);
    }
}