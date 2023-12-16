<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Funcion
 *
 * @property $funcion_id
 * @property $pelicula_id
 * @property $sala_id
 * @property $fecha_hora_func
 * @property $valor_func
 * @property $created_at
 * @property $updated_at
 *
 * @property Boleta[] $boletas
 * @property Pelicula $pelicula
 * @property Sala $sala
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Funcion extends Model
{
    protected $primaryKey = 'funcion_id';
    static $rules = [
        'fecha_func' => 'required',
        'hora_func' => 'required',
        'pelicula_id' => 'required',
        'sala_id' => 'required',
        'valor_func' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['funcion_id', 'pelicula_id', 'sala_id', 'fecha_hora_func', 'valor_func'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boletas()
    {
        return $this->hasMany('App\Models\Boleta', 'funcion_id', 'funcion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelicula()
    {
        return $this->hasOne('App\Models\Pelicula', 'pelicula_id', 'pelicula_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sala()
    {
        return $this->hasOne('App\Models\Sala', 'sala_id', 'sala_id')->with('teatro');
    }
}
