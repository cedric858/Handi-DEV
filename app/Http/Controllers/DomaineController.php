<?php

namespace App\Http\Controllers;

use App\Domaine;
use App\Http\Requests\DomaineRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1 Nombre d'indicateur 
        $active = "domaine";
        

        $items = Domaine::orderBy("libelle")->paginate(config('app.nbr_page'));
        $nbrItems = DB::table('domaines')->count();
     return view('handi-admin.admindomaine.index',compact('active','items','nbrItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "domaine";
        return view('handi-admin.admindomaine.add',compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DomaineRequest $request)
    {
        Domaine::create($request->validated());
        $active = "domaine";
        return redirect()->route('domaines.index',['active'=>$active])->with('success','Domaine ajouté avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine $Domaine)
    {
         
        $active = "domaine";
        $item = Domaine::findOrFail($Domaine)->first();
        
        return view('handi-admin.admindomaine.show',compact('active','item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function edit(Domaine $domaine)
    {
        $item = Domaine::findOrFail($domaine)->first();
        $active = "domaine";
        return view('handi-admin.admindomaine.edit',compact('active','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function update(DomaineRequest $request, Domaine $domaine)
    {
        $active = "domaine";
        
        $ledomaine = Domaine::find($domaine)->first();
       $validatedDomaines = $request->validated();

       $ledomaine->libelle = $validatedDomaines['libelle'];
        $ledomaine->description = $validatedDomaines['description'];
        $ledomaine->save();
        
        //$domaine->update($request->validated());
        return redirect()->route('domaines.index',['active'=>$active])->with('success','Domaine modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domaine $domaine)
    {
        $ledomaine = Domaine::find($domaine)->first();
        $active = "domaine";
        if( $ledomaine->indicateurs()->count() > 0)
        {
            return redirect()->route('domaines.index',['active',$active])
            ->with('error','Veuillez supprimer d"abord les indicateurs de ce domaine');

        }

        $ledomaine->delete();
        return redirect()->route('domaines.index',['active',$active])->with('success','Domaine supprimé avec succès');


    }
}
