<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ciudades()
    {
        return $this->hasMany('App\Models\Ciudad', 'cod_departamento', 'cod_departamento');
    }
}
