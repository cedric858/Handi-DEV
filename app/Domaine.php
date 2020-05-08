<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    protected $fillable = ['libelle','description'];

    public function indicateurs()
    {
        return $this->hasMany('App\Indicateur');
    }

    public function ophs()
    {
        return $this->belongsToMany('App\Oph','domaine_oph','domaine_id','oph_id')->withTimestamps();
    }
}
