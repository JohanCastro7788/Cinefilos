<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 *
 * @property $pelicula_id
 * @property $peli_nombre
 * @property $peli_descrip
 * @property $peli_duracion
 * @property $created_at
 * @property $updated_at
 *
 * @property Funcion[] $funcions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pelicula extends Model
{
  protected $primaryKey = 'pelicula_id';
  static $rules = [
    'peli_nombre' => 'required',
    'peli_descrip' => 'required',
    'peli_duracion' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['pelicula_id', 'peli_nombre', 'peli_descrip', 'peli_duracion'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function funcions()
  {
    return $this->hasMany('App\Models\Funcion', 'pelicula_id', 'pelicula_id');
  }
}
