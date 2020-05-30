<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Domaine;
use App\Http\Requests\OphRequest;
use App\Langue;
use App\Oph;
use App\Province;
use App\Region;
use App\Responsable;
use App\TypeHandicap;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Oph::paginate(config('app.nbr_page'));
        $nbrItems = DB::table('ophs')->count();
     return view('handi-admin.adminoph.index',compact('items','nbrItems'));   
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('handi-admin.adminoph.add',['typeHandicaps'=>TypeHandicap::all()->sortBy("libelle")
        ,'domaines'=>Domaine::all()->sortBy("libelle"),
        'langues'=>Langue::all()->sortBy("libelle"),
        'regions'=>Region::all()->sortBy("libelle"),
        'provinces'=>Province::all()->sortBy("libelle"),
        'communes'=>Commune::all()->sortBy("libelle")]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $valid = $request->validate([
            
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
            'nbrMembreFemme'=>'required|numeric',
            'nbrMembreAlphabetise'=>'required',
            'nbrMembreScolarise'=>'required',
            'structure'=>'required',
            
            'langue_id'=>'required|exists:langues,id',
            'region_id'=>'required',
            'province_id'=>'required',
            'commune_id'=>'required',
            'zoneInt'=>'required',
            'nom'=>'required',
            'prenom'=>'required|max:255',
            'phone'=>'required|max:255',
            'sexe'=>'required|max:255',
            'profession'=>'required|max:255',
            'numbRecipisse'=>'required|max:255',
            'statut'=>'required|max:255',
            'type'=>'required|max:255',
        ]);
        
       

        DB::beginTransaction();
        try{
            //Enregistrement des informations du responsable
            
            
           Responsable::create(['nom'=>$valid['nom'],
            'prenom'=>$valid['prenom'],
            'phone'=>$valid['phone'],
            'profession'=>$valid['profession'],
            'sexe'=>$valid['sexe']]);
   
          
   

        }
        catch(\Exception $e)
        {
            DB::rollBack();
            throw $e;
        }
        try
        { 

            $lastinsertedResp = DB::table('responsables')->latest()->first();
            $lastinsertedRespId = (int)filter_var($lastinsertedResp->id,FILTER_SANITIZE_NUMBER_INT);
            

            $date = \Carbon\Carbon::createFromDate($request->dateCreation)
            ->format('Y-m-d H:i:s');
            

            $oph = new Oph([
            'nomOph'=>$valid['nomOph'],
            'sigle'=>$valid['sigle'],
            'telephoneOph'=>$valid['telephoneOph'],
            'missionObjectif'=>$valid['missionObjectif'],
            'dateCreation'=>$date,
            'activite'=>$valid['activite'],
            'beneficiaire'=>$valid['beneficiaire'],
            'accessibilite'=>$valid['accessibilite'],
            'sourceFinancement'=>$valid['sourceFinancement'],
            'partenaire'=>$valid['partenaire'],
            'nbrAdherantHomme'=>$valid['nbrMembreHomme'],
            'nbrAdherantFemme'=>$valid['nbrAdherantFemme'],
            'nbrMembreHomme'=>$valid['nbrMembreHomme'],
            'nbrMembreFemme'=>$valid['nbrMembreFemme'],
            'nbrMembreAlphabetise'=>$valid['nbrMembreAlphabetise'],
            'nbrMembreScolarise'=>$valid['nbrMembreScolarise'],
            'structure'=>$valid['structure'],
            'region_id'=>$valid['region_id'],
            'province_id'=>$valid['province_id'],
            'commune_id'=>$valid['commune_id'],
            'zoneInt'=>$valid['zoneInt'],
            'responsable_id'=>$lastinsertedRespId,
            'numbRecipisse'=>$valid['numbRecipisse'],
            'statut'=>$valid['statut'],
            'type'=>$valid['type']]);
            
            

            $oph->save();
            
            

            $oph->langues()->attach($valid['langue_id']);
            
            $oph->domaines()->attach($valid['domaine_id']);
            $oph->type_handicaps()->attach($valid['type_handicap_id']);
            return redirect()->route('ophs.index')->with('success','OPH ajoutée avec succès');


            // DB::table('users')
            // ->insert(['nomOph'=>$valid['nomOph'],
            // 'sigle'=>$valid['sigle'],
            // 'dateCreation'=>$date,
            // 'activite'=>$valid['activite'],
            // 'beneficiaire'=>$valid['beneficiaire'],
            // 'accessibilite'=>$valid['accessibilite'],
            // 'sourceFinancement'=>$valid['sourceFinancement'],
            // 'partenaire'=>$valid['partenaire'],
            // 'nbrAdherantHomme'=>$valid['nbrAdherantHomme'],
            // 'nbrAdherantFemme'=>$valid['nbrAdherantFemme'],
            // 'nbrMembreAlphabetise'=>$valid['nbrMembreAlphabetise'],
            // 'nbrMembreScolarise'=>$valid['nbrMembreScolarise'],
            // 'structure'=>$valid['structure'],
            // 'region_id'=>$valid['region_id'],
            // 'province_id'=>$valid['province_id'],
            // 'commune_id'=>$valid['commune_id'],
            // 'zoneInt'=>$valid['zoneInt'],
            // 'responsable_id'=>$lastinsertedRespId,
            // 'numbRecipisse'=>$valid['numbRecipisse'],
            // 'statut'=>$valid['statut'],
            // 'type'=>$valid['type']]);
   

        }
        catch(Exception $e)
        {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
         

        //return redirect(  )->route('ophs.index')->with('success','Organsisation ajoutée avec succès');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oph  $oph
     * @return \Illuminate\Http\Response
     */
    public function show(Oph $oph)
    {
         return view('handi-admin.adminoph.show', compact('oph'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oph  $oph
     * @return \Illuminate\Http\Response
     */
    public function edit(Oph $oph)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oph  $oph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oph $oph)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oph  $oph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oph $oph)
    {
        //
    }
}
