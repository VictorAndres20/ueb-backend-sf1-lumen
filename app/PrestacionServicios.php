<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PrestacionServicios extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prestacion_servicios';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_prestacion';

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
        'cod_prestacion',
        'nom_prestacion',
        'descripcion_prestacion',
        'valor'
    ];

    /**
     * ManyToMany Relationship
     * ('Modelo al que se relaciona','tabla muchos a muchos','Columna del modelo actual que se relaciona','Columna de la tabla con que se relaciona')
     */
    
    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario', 'usuario_prestacion', 'cod_prestacion', 'cod_usuario');
    }
}