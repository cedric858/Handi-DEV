<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oph extends Model
{
    public function responsable()
    {
        return $this->belongsTo('App\Responsable');
    }
    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function domaines()
    {
        return $this->belongsToMany('App\Domaine')->withTimestamps();
    }
    public function langues()
    {
        return $this->belongsToMany('App\Lanque');
    }
    public function type_handicaps()
    {
        return $this->belongsToMany('App\TypeHandicap','oph_type_handicap','oph_id','type_handicap_id');
    }

    



}
