<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['libelle'];

    public function cheflieu()
    {
        return $this->hasOne('App\Cheflieu');
    }

    public function ophs()
    {
        return $this->hasMany('App\Oph');
    }

}
