<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oph extends Model
{
    protected $fillable =
     ['nom','prenom','sexe','phone','profession',
'nomOph',
'sigle',
'missionObjectif',
'telephoneOph',
'type_handicap_id',
'domaine_id',
'dateCreation',
'activite',
'beneficiaire',
'accessibilite',
'sourceFinancement',
'partenaire',
'nbrAdherantHomme',
'nbrAdherantFemme',
'nbrMembreHomme',
'nbrMembreFemme',
'nbrMembreAlphabetise',
'nbrMembreScolarise',
'structure',
'langue_id',
'region_id',
'responsable_id',
'province_id',
'commune_id',
'zoneInt',
'numbRecipisse',
'statut',
'type'];


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
        return $this->belongsToMany('App\Langue')->withTimestamps();
    }
    public function type_handicaps()
    {
        return $this->belongsToMany('App\TypeHandicap','oph_type_handicap','oph_id','type_handicap_id')->withTimestamps();
    }

    



}
