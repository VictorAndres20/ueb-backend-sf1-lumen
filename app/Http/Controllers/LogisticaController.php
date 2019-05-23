<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logistica;


class LogisticaController extends Controller
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
            $logistica=new Logistica;
            $logistica->nom_logistica=$request->nom_logistica;
            $logistica->cod_tipo_logistica=$request->cod_tipo_logistica;
            $logistica->valor=$request->valor;
            $logistica->cantidad=$request->cantidad;
            $logistica->cod_estado_logistica=$request->cod_estado_logistica;
            $logistica->fecha_creacion=date("Y-m-d");
            $logistica->fecha_actualizado=date("Y-m-d");
            $logistica->save();
            $res['message']='Logistica creado con éxito';
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
            $logistica=Logistica::find($request->cod_logistica);
            $logistica->nom_logistica=$request->nom_logistica;
            $logistica->cod_tipo_logistica=$request->cod_tipo_logistica;
            $logistica->valor=$request->valor;
            $logistica->cantidad=$request->cantidad;
            $logistica->fecha_actualizado=date("Y-m-d");
            $logistica->cod_estado_logistica=$request->cod_estado_logistica;
            $logistica->save();
            $res['message']='Logistica actualizado con éxito';
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
        $res=['message'=>Logistica::with('tipo')->with('estado')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listMateriaPrimaAlmacenada()
    {
        $res=['message'=>Logistica::where('cod_tipo_logistica',1)->where('cod_estado_logistica',1)->with('tipo')->with('estado')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listMateriaPrimaProduccion()
    {
        $res=['message'=>Logistica::where('cod_tipo_logistica',1)->where('cod_estado_logistica',2)->with('tipo')->with('estado')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listProductoTerminadoEnvio()
    {
        $res=['message'=>Logistica::where('cod_tipo_logistica',2)->where('cod_estado_logistica',3)->with('tipo')->with('estado')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listProductoTerminadoEnviado()
    {
        $res=['message'=>Logistica::where('cod_tipo_logistica',2)->where('cod_estado_logistica',4)->with('tipo')->with('estado')->get(),'success'=>true];
        return response()->json($res,200);
    }
}