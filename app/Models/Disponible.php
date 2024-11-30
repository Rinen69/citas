<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Disponible
 *
 * @property $id
 * @property $medico_id
 * @property $fecha
 * @property $hora
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta[] $consultas
 * @property Medico $medico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Disponible extends Model
{
    
    static $rules = [
		'medico_id' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['medico_id','fecha','hora','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'disponible_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medico()
    {
        return $this->hasOne('App\Models\Medico', 'id', 'medico_id');
    }
    

}
