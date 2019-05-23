<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;

class Usuario extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_usuario';

    /**
     * Not timestamped
     */
    public $timestamps = false;

    /**
     * The model's fillable values.
     *
     * @var array
     */
    protected $fillable = [
        'cod_usuario',
        'nombre_usuario',
        'apellido_usuario',
        'correo_usuario',
        'cod_estado'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'clave_usuario'
    ];

    /**
     * ManyToOne Relationship
     * Un Usuario puede tener a un Estado
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    public function estado()
    {
        return $this->HasOne('App\Estado','cod_estado', 'cod_estado');
    }

    /**
     * ManyToOne Relationship
     * 
     */
    public function rol()
    {
        return $this->HasOne('App\Rol','cod_rol','cod_rol');
    }

    /**
     * ManyToMany Relationship
     * ('Modelo al que se relaciona','tabla muchos a muchos','Columna del modelo actual que se relaciona','Columna de la tabla con que se relaciona')
     */
    
    public function prestaciones()
    {
        return $this->belongsToMany('App\PrestacionServicios', 'usuario_prestacion', 'cod_usuario', 'cod_prestacion');
    }

    /**
     * Manual query
     */
    public static function getValoresTotales()
    {
        $sql="SELECT usuario.cod_usuario,usuario.nombre_usuario, usuario.apellido_usuario, rol.nombre_rol,departamento.nombre_departamento,SUM(prestacion_servicios.valor) AS prestaciones,rol.valor_salario,rol.valor_salario-SUM(prestacion_servicios.valor) AS total FROM usuario,rol,departamento,usuario_prestacion,prestacion_servicios WHERE usuario.cod_rol=rol.cod_rol AND rol.cod_departamento=departamento.cod_departamento AND usuario_prestacion.cod_usuario=usuario.cod_usuario AND usuario_prestacion.cod_prestacion=prestacion_servicios.cod_prestacion GROUP BY usuario.cod_usuario,usuario.nombre_usuario,usuario.apellido_usuario, rol.nombre_rol,departamento.nombre_departamento,rol.valor_salario";
        return DB::select($sql);
    } 

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}