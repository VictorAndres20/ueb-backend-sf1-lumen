<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estado';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_estado';

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
        'cod_estado',
        'nombre_estado',
        'descripcion_estado'
    ];

    /**
     * OneToMany Relationship
     * Un Estado puede pertenecer a muchos Usuarios
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario','cod_estado', 'cod_estado');
    }
}