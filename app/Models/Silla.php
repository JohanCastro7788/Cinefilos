<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Silla
 *
 * @property $silla_id
 * @property $concecutivo
 * @property $sala_id
 * @property $tipo_silla
 * @property $columna
 * @property $numero
 * @property $created_at
 * @property $updated_at
 *
 * @property Sala $sala
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Silla extends Model
{

  protected $primaryKey = 'silla_id';
  static $rules = [
    'sala_id' => 'required',
    'tipo_silla' => 'required',
    'columna' => 'required',
    'numero' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['silla_id', 'concecutivo', 'sala_id', 'tipo_silla', 'columna', 'numero'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function sala()
  {
    return $this->hasOne('App\Models\Sala', 'sala_id', 'sala_id');
  }
}
