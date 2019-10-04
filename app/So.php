<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class So extends Model
{
    protected $fillable =['nombre', 'version', 'compilacion', 'descripcion'];

    public function scripts(){
        return $this->belongsToMany(Script::class, 'scripts_sos', 'so_id', 'script_id')->withTimestamps();
    }
}
