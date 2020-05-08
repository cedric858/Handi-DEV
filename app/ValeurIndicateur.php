<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValeurIndicateur extends Model
{
    public function indicateur()
    {
        return $this->belongsTo('App\Indicateur');
    }
    public function type_desagregations()
    {
        return $this->belongsToMany('App\TypeDesagregation','desagregation_valeur_type_desagregation','valeur_indicateurs','type_desagregations_id');
    }
}
