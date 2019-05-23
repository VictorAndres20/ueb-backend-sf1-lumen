<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Finanza extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'finanza';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_finanza';

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
        'cod_finanza',
        'cod_tipo_finanza',
        'cod_tipo_transaccion',
        'val_transaccion',
        'fecha_transaccion'
    ];

    /**
     * ManyToOne Relationship
     * Una finanza puede tener a un TipoFinanza
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    public function tipoFinanza()
    {
        return $this->HasOne('App\TipoFinanza','cod_tipo_finanza', 'cod_tipo_finanza');
    }

    /**
     * ManyToOne Relationship
     * Una Finanza puede tener a un TipoTransaccion
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    public function tipoTransaccion()
    {
        return $this->HasOne('App\TipoTransaccion','cod_tipo_transaccion', 'cod_tipo_transaccion');
    }

}