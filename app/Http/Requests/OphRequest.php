<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OphRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            
            'nomOph'=>'required',
            'sigle'=>'required',
            'missionObjectif'=>'required',
            'telephoneOph'=>'required',
            'type_handicap_id'=>'required|exists:type_handicaps,id',
            'domaine_id'=>'required|exists:domaines,id',
            'dateCreation'=>'required',
            'activite'=>'required',
            'beneficiaire'=>'required',
            'accessibilite'=>'required',
            'sourceFinancement'=>'required',
            'partenaire'=>'required',
            'nbrAdherantHomme'=>'required|numeric',
            'nbrAdherantFemme'=>'required|numeric',
            'nbrMembreHomme'=>'required|numeric',
            'nbrMembreHomme'=>'required|numeric',
            'nbrMembreAlphabetise'=>'required',
            'nbrMembreScolarise'=>'required',
            'langue_id'=>'required|exists:langues,id',
            'region_id'=>'required',
            'province_id'=>'required',
            'commune_id'=>'required',
            'zoneInt'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'prenom'=>'required|max:255',
            'phone'=>'required|max:255',
            'sexe'=>'required|max:255',
            'profession'=>'required|max:255',
            'numbRecipisse'=>'required|max:255',
            'statut'=>'required|max:255',
            'type'=>'required|max:255',
        ];
    }
}
