<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheflieu extends Model
{
    protected $table = 'cheflieus';
    protected $fillable = ['libelle','region_id'];
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function provinces()
    {
        return $this->hasMany('App\Province');
    }

    public function ophs()
    {
        return $this->hasMany('App\Oph');
    }

}
