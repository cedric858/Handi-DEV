<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeHandicap extends Model
{
    public function ophs()
    {
        return $this->belongsToMany('App\Oph','oph_type_handicap','oph_id','type_handicap_id');
    }

}
