<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoLogistica;

class TipoLogisticaController extends Controller
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
            $tipo=new TipoLogistica;
            $tipo->cod_tipo_logistica=$request->cod_tipo_logistica;
            $tipo->nom_tipo_logistica=$request->nom_tipo_logistica;
            $tipo->descripcion_tipo_logistica=$request->descripcion_tipo_logistica;
            $tipo->save();
            $res['message']='Tipo Logistica creado con éxito';
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
            $tipo=TipoLogistica::find($request->cod_tipo_logistica);
            $tipo->nom_tipo_logistica=$request->nom_tipo_logistica;
            $tipo->descripcion_tipo_logistica=$request->descripcion_tipo_logistica;
            $tipo->save();
            $res['message']='Tipo logistica actualizado con éxito';
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
        $res=['message'=>TipoLogistica::all(),'success'=>true];
        return response()->json($res,200);
    }
    }


