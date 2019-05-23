<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departamento';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_departamento';

    /**
     * Not timestamped
     */
    public $timestamps = false;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $fillable = [
        'cod_departamento',
        'nombre_departamento',
        'descripcion_departamento'
    ];

    /**
     * OneToMany Relationship
     * Un Departamento puede pertenecer a muchos Roles
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    public function roles()
    {
        return $this->belongsToMany('App\Rol','cod_departamento', 'cod_departamento');
    }
}