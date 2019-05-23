<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoTransaccion;

class TipoTransaccionController extends Controller
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
            $tipo=new TipoTransaccion;
            $tipo->nombre_tipo_transaccion=$request->nombre_tipo_transaccion;
            $tipo->descripcion_tipo_transaccion=$request->descripcion_tipo_transaccion;
            $tipo->save();
            $res['message']='Tipo Transacción creado con éxito';
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
            $tipo=TipoFinanzas::find($request->cod_tipo_transaccion);
            $tipo->nombre_tipo_transaccion=$request->nombre_tipo_transaccion;
            $tipo->descripcion_tipo_transaccion=$request->descripcion_tipo_transaccion;
            $tipo->save();
            $res['message']='Tipo transacción actualizado con éxito';
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
        $res=['message'=>TipoTransaccion::all(),'success'=>true];
        return response()->json($res,200);
    }
    }


