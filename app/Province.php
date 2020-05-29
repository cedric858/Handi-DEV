<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['libelle','cheflieu_id'];

    public function cheflieu()
    {
        return $this->belongsTo('App\Cheflieu');
    }

    public function communes()
    {
        return $this->hasMany('App\Commune');
    }

    public function ophs()
    {
        return $this->hasMany('App\Oph');
    }


}
