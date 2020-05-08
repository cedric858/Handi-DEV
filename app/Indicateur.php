<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    public function valeurindicateurs()
    {
        return $this->hasMany('App\ValeurIndicateur');
    }

}
