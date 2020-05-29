<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['libelle','province_id'];

    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
