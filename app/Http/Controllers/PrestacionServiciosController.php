<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PrestacionServicios;

class PrestacionServiciosController extends Controller
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
            $prestacion=new PrestacionServicios;
            $prestacion->cod_prestacion=$request->cod_prestacion;
            $prestacion->nom_prestacion=$request->nom_prestacion;
            $prestacion->descripcion_prestacion=$request->descripcion_prestacion;
            $prestacion->valor=$request->valor;
            $prestacion->save();
            $res['message']='Prestación de servicio creado con éxito';
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
            $prestacion=PrestacionServicios::find($request->cod_prestacion);
            $prestacion->nom_prestacion=$request->nom_prestacion;
            $prestacion->descripcion_prestacion=$request->descripcion_prestacion;
            $prestacion->valor=$request->valor;
            $prestacion->save();
            $res['message']='Prestación de servicios actualizado con éxito';
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
        $res=['message'=>PrestacionServicios::with('usuarios')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listById($cod_prestacion)
    {
        $res=['message'=>PrestacionServicios::with('usuarios')->find($cod_prestacion),'success'=>true];
        return response()->json($res,200);
    }
}