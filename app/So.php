<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class So extends Model
{
    protected $fillable =['nombre', 'version', 'compilacion', 'descripcion'];
}
