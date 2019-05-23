<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class TipoFinanza extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='tipo_finanza';

    /**
     * Primary Key
     */
    protected $primaryKey='cod_tipo_finanza';

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
        'cod_tipo_finanza',
        'nombre_tipo_finanza',
        'descripcion_tipo_finanza'
    ];

    /**
     * OneToMany
     */
    public function finanzas()
    {
        return $this->belongsTo('App\Finanza','cod_tipo_finanza','cod_tipo_finanza');
    }
}
?>