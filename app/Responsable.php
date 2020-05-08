<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
     public function ophs()
    {
        return $this->hasMany('App\Oph');
    }
}
