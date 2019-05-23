<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class TipoLogistica extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='tipo_logistica';

    /**
     * Primary Key
     */
    protected $primaryKey='cod_tipo_logistica';

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
        'cod_tipo_logistica',
        'nom_tipo_logistica',
        'descripcion_tipo_logistica'
    ];

    /**
     * OneToMany Relationship
     * Un tipo logistica puede pertenecer a muchos Logistica 
     * ('Modelo al que se relaciona','Columna del modelo con que se relaciona','Columna del modelo actual que se relaciona')
     */
    
    public function logisticaTipo()
    {
        return $this->belongsToMany('App\Logistica','cod_tipo_logistica', 'cod_tipo_logistica');
    }
}
?>