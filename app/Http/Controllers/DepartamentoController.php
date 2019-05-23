<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;


class DepartamentoController extends Controller
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
            $departamento=new Departamento;
            $departamento->cod_departamento=$request->cod_departamento;
            $departamento->nombre_departamento=$request->nombre_departamento;
            $departamento->descripcion_departamento=$request->descripcion_departamento;
            $departamento->save();
            $res['message']='Departamento creado con éxito';
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
            $departamento=Departamento::find($request->cod_departamento);
            $departamento->cod_departamento=$request->cod_departamento;
            $departamento->nombre_departamento=$request->nombre_departamento;
            $departamento->descripcion_departamento=$request->descripcion_departamento;
            $departamento->save();
            $res['message']='Departamento actualizado con éxito';
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
        $res=['message'=>Departamento::all(),'success'=>true];
        return response()->json($res,200);
    }
}