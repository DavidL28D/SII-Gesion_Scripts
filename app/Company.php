<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =['nombre', 'direccion', 'telefono', 'descripcion'];

    public function scripts(){
        return $this->hasMany(Script::class, 'empresa_id')->withTimestamps();
    }
}
