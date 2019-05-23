<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rol;


class RolController extends Controller
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
            $rol=new Rol;
            $rol->cod_rol=$request->cod_rol;
            $rol->nombre_rol=$request->nombre_rol;
            $rol->descripcion_rol=$request->descripcion_rol;
            $rol->valor_salario=$request->valor_salario;
            $rol->cod_departamento=$request->cod_departamento;
            $rol->save();
            $res['message']='Rol creado con éxito';
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
            $rol=Rol::find($request->cod_rol);
            $rol->nombre_rol=$request->nombre_rol;
            $rol->descripcion_rol=$request->descripcion_rol;
            $rol->valor_salario=$request->valor_salario;
            $rol->cod_departamento=$request->cod_departamento;
            $rol->save();
            $res['message']='Rol actualizado con éxito';
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
        $res=['message'=>Rol::with('departamento')->with('permisos')->get(),'success'=>true];
        return response()->json($res,200);
    }
}