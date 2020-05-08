<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $fillable = ['libelle'];

    public function ophs()
    {
        return $this->belongsToMany('App\Oph','langue_oph','langue_id','oph_id');
    }
}
