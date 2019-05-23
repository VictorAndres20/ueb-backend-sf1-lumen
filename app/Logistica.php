<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Logistica extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logistica';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_logistica';

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
        'cod_logistica',
        'nom_logistica',
        'cod_tipo_logistica',
        'valor',
        'cantidad',
        'fecha_creacion',
        'fecha_actualizado',
        'cod_estado_logica'
    ];

    /**
     * ManyToOne Relationship
     * Una logistica puede estar asociado a un Tipo de logistica
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    
    public function tipo()
    {
        return $this->HasOne('App\TipoLogistica','cod_tipo_logistica', 'cod_tipo_logistica');
    }

    /**
     * ManyToOne Relationship
     * Una logistica puede estar asociado a un Tipo de logistica
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    
    public function estado()
    {
        return $this->HasOne('App\EstadoLogistica','cod_estado_logistica', 'cod_estado_logistica');
    }
}