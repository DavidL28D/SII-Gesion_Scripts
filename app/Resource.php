<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable =['nombre', 'version', 'tipo', 'descripcion'];

    public function scripts(){
        return $this->belongsToMany(Script::class, 'scripts_sos', 'resource_id', 'script_id')->withTimestamps();
    }
}
