<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EstadoLogistica;


class EstadoLogisticaController extends Controller
{
    public function __construct()
    {
    }

    public function create(Request $request)
    {
        $res=['message'=>'Error fatal','success'=>'SUCCESS_ERROR'];
        try
        {
            $estado=new EstadoLogistica;
            $estado->cod_estado_logistica=$request->cod_estado_logistica;
            $estado->nom_estado_logistica=$request->nom_estado_logistica;
            $estado->save();
            $res['message']='Estado logistica creado con éxito';
            $res['success']='SUCCESS';
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
            $estado=EstadoLogistica::find($request->cod_estado_logistica);
            $estado->nom_estado_logistica=$request->nom_estado_logistica;
            $estado->save();
            $res['message']='Estado Logística actualizado con éxito';
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
    public function delete($cod_estado_logistica)
    {
        $res=['message'=>'Error fatal','success'=>false];
        try
        {
            EstadoLogistica::destroy($cod_estado_logistica);
            $res['message']='Estado Logística eliminado con éxito';
            $res['success']=true;
            return response()->json($res,201);
        }
        catch(Exception $e)
        {
            $res['message']='FATAL ERROR: '.$e;
            return response()->json($res,500);
        }
    }

    public function list()
    {
        $res=['message'=>EstadoLogistica::all(),'success'=>'SUCCESS'];
        return response()->json($res,200);
    }
}