<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class TipoTransaccion extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='tipo_transaccion';

    /**
     * Primary Key
     */
    protected $primaryKey='cod_tipo_transaccion';

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
        'cod_tipo_transaccion',
        'nombre_tipo_transaccion',
        'descripcion_tipo_transaccion'
    ];

    /**
     * OneToMany
     */
    /**
     * OneToMany
     */
    public function finanzas()
    {
        return $this->belongsTo('App\Finanza','cod_tipo_transaccion','cod_tipo_transaccion');
    }
}
?>