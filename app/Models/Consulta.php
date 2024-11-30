<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consulta
 *
 * @property $id
 * @property $user_id
 * @property $servicio_id
 * @property $disponible_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Disponible $disponible
 * @property Servicio $servicio
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consulta extends Model
{
    
    static $rules = [
		'paciente_id' => 'required',
		'servicio_id' => 'required',
		'disponible_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paciente_id','servicio_id','disponible_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function disponible()
    {
        return $this->hasOne('App\Models\Disponible', 'id', 'disponible_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
    }
    

}
