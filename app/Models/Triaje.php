<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Triaje
 *
 * @property $id
 * @property $consulta_id
 * @property $peso
 * @property $talla
 * @property $tensionarterial
 * @property $saturacionoxigeno
 * @property $temperatura
 * @property $frecuenciarespiratoria
 * @property $frecuenciacardiaca
 * @property $observacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Consulta $consulta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Triaje extends Model
{
    
    static $rules = [
		'consulta_id' => 'required',
		'peso' => 'required',
		'talla' => 'required',
		'tensionarterial' => 'required',
		'saturacionoxigeno' => 'required',
		'temperatura' => 'required',
		'frecuenciarespiratoria' => 'required',
		'frecuenciacardiaca' => 'required',
		'observacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['consulta_id','peso','talla','tensionarterial','saturacionoxigeno','temperatura','frecuenciarespiratoria','frecuenciacardiaca','observacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consulta()
    {
        return $this->hasOne('App\Models\Consulta', 'id', 'consulta_id');
    }
    

}
