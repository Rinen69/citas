<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $descripcion
 * @property $costo
 * @property $created_at
 * @property $updated_at
 *
 * @property Asignaservicio[] $asignaservicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'costo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','costo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaservicios()
    {
        return $this->hasMany('App\Models\Asignaservicio', 'servicio_id', 'id');
    }
    

}
