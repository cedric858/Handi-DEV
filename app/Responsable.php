<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $fillable = ['nom','prenom','sexe','phone','profession'];

     public function ophs()
    {
        return $this->hasMany('App\Oph');
    }
}
