<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignaservicio
 *
 * @property $id
 * @property $servicio_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Servicio $servicio
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */class Asignaservicio extends Model
{
    static $rules = [
        'servicio_id' => 'required',
        'medico_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['servicio_id', 'medico_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}