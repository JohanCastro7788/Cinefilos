<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sala
 *
 * @property $sala_id
 * @property $consecutivo
 * @property $tipo_sala
 * @property $teatro_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Funcion[] $funcions
 * @property Silla[] $sillas
 * @property Teatro $teatro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sala extends Model
{
    protected $primaryKey = 'sala_id';

    static $rules = [
        'consecutivo' => 'required',
        'tipo_sala' => 'required',
        'teatro_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sala_id', 'consecutivo', 'tipo_sala', 'teatro_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function funcions()
    {
        return $this->hasMany('App\Models\Funcion', 'sala_id', 'sala_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sillas()
    {
        return $this->hasMany('App\Models\Silla', 'sala_id', 'sala_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teatro()
    {
        return $this->hasOne('App\Models\Teatro', 'teatro_id', 'teatro_id');
    }
}
