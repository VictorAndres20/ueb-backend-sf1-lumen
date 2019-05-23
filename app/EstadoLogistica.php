<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class EstadoLogistica extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estado_logistica';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_estado_logistica';

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
        'cod_estado_logistica',
        'nom_estado_logistica'
    ];

    /**
     * OneToMany Relationship
     * Un tipo logistica puede pertenecer a muchos Logistica 
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    
    public function logisticaEstado()
    {
        return $this->belongsToMany('App\Logistica','cod_estado_logistica', 'cod_estado_logistica');
    }
}