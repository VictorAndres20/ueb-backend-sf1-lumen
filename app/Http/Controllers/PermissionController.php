<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Rol;

class PermissionController extends Controller
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
            $permission=new Permission;
            $permission->name_permission=$request->name_permission;
            $permission->route_permission=$request->route_permission;
            $permission->child_permission=$request->child_permission;
            $permission->icon_permission=$request->icon_permission;
            $permission->save();
            $res['message']='Permiso creado con éxito';
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
     * Method PUT
     */
    public function addRol(Request $request)
    {
        $res=['message'=>'Error fatal','success'=>false];
        try
        {
            $rol=Rol::find($request->cod_rol);
            Permission::find($request->cod_permission)->roles()->save($rol);
            $res['message']='Rol agregado con éxito';
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
            $permission=Permission::find($request->cod_permission);
            $permission->name_permission=$request->name_permission;
            $permission->route_permission=$request->route_permission;
            $permission->child_permission=$request->child_permission;
            $permission->icon_permission=$request->icon_permission;
            $permission->save();
            $res['message']='Permiso actualizado con éxito';
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
        $res=['message'=>Permission::with('roles')->get(),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function paginated()
    {
        $res=['message'=>Permission::with('roles')->paginate(1),'success'=>true];
        return response()->json($res,200);
    }

    /**
     * Method GET
     */
    public function listById($cod_permission)
    {
        $res=['message'=>Permission::with('roles')->find($cod_permission),'success'=>true];
        return response()->json($res,200);
    }
}