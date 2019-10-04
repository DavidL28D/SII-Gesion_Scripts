<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable =['nombre', 'version'];

    public function scripts(){
        return $this->hasMany(Script::class, 'lenguaje_id')->withTimestamps();
    }
}
