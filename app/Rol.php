<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rol';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_rol';

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
        'cod_rol',
        'nombre_rol',
        'descripcion_rol',
        'cod_departamento',
        'valor_salario'
    ];

    /**
     * ManyToOne Relationship
     * Un Rol puede estar asociado a un Departamento
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    public function departamento()
    {
        return $this->HasOne('App\Departamento','cod_departamento', 'cod_departamento');
    }

    /**
     * OneToMany Relationship
     * ('Modelo al que se relaciona','Tabla muchos a muchos','Columna de tabla muchos a muchos','Columna del modelo actual que se relaciona')
     */
    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario','cod_rol','cod_rol');
    }

    /**
     * ManyToMany Relationship
     * ('Modelo al que se relaciona','tabla muchos a muchos','Columna del modelo actual que se relaciona','Columna de la tabla con que se relaciona')
     */    
    public function permisos()
    {
        return $this->belongsToMany('App\Permission', 'permission_rol', 'cod_rol', 'cod_permission');
    }

}