<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teatro
 *
 * @property $teatro_id
 * @property $cod_ciudad
 * @property $teatro_nombre
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Ciudad $ciudad
 * @property Sala[] $salas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Teatro extends Model
{

    protected $primaryKey = 'teatro_id';

    static $rules = [
        'cod_ciudad' => 'required',
        'teatro_nombre' => 'required',
        'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['teatro_id', 'cod_ciudad', 'teatro_nombre', 'direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ciudad()
    {
        return $this->hasOne('App\Models\Ciudad', 'cod_ciudad', 'cod_ciudad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salas()
    {
        return $this->hasMany('App\Models\Sala', 'teatro_id', 'teatro_id');
    }
}
