<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeHandicap extends Model
{
    

    
    
    protected $fillable = ['libelle','description'];

    
    public function ophs()
    {
        return $this->belongsToMany('App\Oph','oph_type_handicap','oph_id','type_handicap_id');
    }

}
