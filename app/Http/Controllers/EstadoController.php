<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Estado;


class EstadoController extends Controller
{
    public function __construct()
    {
    }

    public function create(Request $request)
    {
        $res=['message'=>'Error fatal','success'=>'SUCCESS_ERROR'];
        try
        {
            $estado=new Estado;
            $estado->cod_estado=$request->cod_estado;
            $estado->nombre_estado=$request->nombre_estado;
            $estado->save();
            $res['message']='Estado creado con éxito';
            $res['success']='SUCCESS';
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
        $res=['message'=>Estado::all(),'success'=>'SUCCESS'];
        return response()->json($res,200);
    }
}