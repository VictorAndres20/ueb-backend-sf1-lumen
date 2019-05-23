<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission';

    /**
     * Primary Key
     */
    protected $primaryKey = 'cod_permission';

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
        'cod_permission',
        'name_permission',
        'route_permission',
        'child_permission',
        'icon_permission'
    ];

    /**
     * ManyToMany Relationship
     * ('Modelo al que se relaciona','tabla muchos a muchos','Columna del modelo actual que se relaciona','Columna de la tabla con que se relaciona')
     */
    
    public function roles()
    {
        return $this->belongsToMany('App\Rol', 'permission_rol', 'cod_permission', 'cod_rol');
    }
}