<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $id
 * @property $user_id
 * @property $condicionvida_id
 * @property $habitohigiene_id
 * @property $habitoalimento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Condicionvida $condicionvida
 * @property Consulta[] $consultas
 * @property Habitoalimento $habitoalimento
 * @property Habitohigiene $habitohigiene
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'condicionvida_id' => 'required',
		'habitohigiene_id' => 'required',
		'habitoalimento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','condicionvida_id','habitohigiene_id','habitoalimento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function condicionvida()
    {
        return $this->hasOne('App\Models\Condicionvida', 'id', 'condicionvida_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'paciente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function habitoalimento()
    {
        return $this->hasOne('App\Models\Habitoalimento', 'id', 'habitoalimento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function habitohigiene()
    {
        return $this->hasOne('App\Models\Habitohigiene', 'id', 'habitohigiene_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    

}
