<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoFinanza;

class TipoFinanzaController extends Controller
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
            $tipo=new TipoFinanza;
            $tipo->nombre_tipo_finanza=$request->nombre_tipo_finanza;
            $tipo->descripcion_tipo_finanza=$request->descripcion_tipo_finanza;
            $tipo->save();
            $res['message']='Tipo Finanzas creado con éxito';
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
            $tipo=TipoFinanzas::find($request->cod_tipo_usuario);
            $tipo->nombre_tipo_finanza=$request->nombre_tipo_finanza;
            $tipo->descripcion_tipo_finanza=$request->descripcion_tipo_finanza;
            $tipo->save();
            $res['message']='Tipo Finanza actualizado con éxito';
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
        $res=['message'=>TipoFinanza::all(),'success'=>true];
        return response()->json($res,200);
    }
    }


