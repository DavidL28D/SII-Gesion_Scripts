<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $fillable =['nombre', 'argumentos', 'retorno', 'descripcion', 'permisos', 'creacion', 'lenguaje_id', 'so_id', 'recurso_id', 'empresa_id'];

    public function language(){
        return $this->belongsTo(Language::class, 'lenguaje_id')->withTimestamps();
    }

    public function company(){
        return $this->belongsTo(Company::class, 'empresa_id')->withTimestamps();
    }

    public function sos(){
        return $this->belongsToMany(Script::class, 'scripts_sos', 'script_id', 'so_id')->withTimestamps();
    }

    public function resources(){
        return $this->belongsToMany(Script::class, 'scripts_resources', 'script_id', 'recurso_id')->withTimestamps();
    }

}
