<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Finanza;


class FinanzaController extends Controller
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
            $finanza=new Finanza;
            $finanza->cod_tipo_finanza=$request->cod_tipo_finanza;
            $finanza->cod_tipo_transaccion=$request->cod_tipo_transaccion;
            $finanza->val_transaccion=$request->val_transaccion;
            $finanza->fecha_transaccion=$request->fecha_transaccion;
            $finanza->save();
            $res['message']='Finanza creado con éxito';
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
     * Method POST
     */
    public function update(Request $request)
    {
        $res=['message'=>'Error fatal','success'=>false];
        try
        {
            $finanza=Finanza::find($request->cod_finanza);
            $finanza->cod_tipo_finanza=$request->cod_tipo_finanza;
            $finanza->cod_tipo_transaccion=$request->cod_tipo_transaccion;
            $finanza->val_transaccion=$request->val_transaccion;
            $finanza->fecha_transaccion=$request->fecha_transaccion;
            $usuario->save();
            $res['message']='Usuario actualizado con éxito';
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
        $res=['message'=>Finanza::with('tipoFinanza')->with('tipoTransaccion')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listIngresos()
    {
        $res=['message'=>Finanza::where('cod_tipo_finanza',1)->with('tipoTransaccion')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listEngresos()
    {
        $res=['message'=>Finanza::where('cod_tipo_finanza',2)->with('tipoTransaccion')->get(),'success'=>true];
        return response()->json($res,200);
    }
}