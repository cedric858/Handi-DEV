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
        

        $items = Domaine::orderBy("libelle")->paginate(config('app.nbr_page'));
        $nbrItems = DB::table('domaines')->count();
     return view('handi-admin.admindomaine.index',compact('items','nbrItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('handi-admin.admindomaine.add');
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
        return redirect()->route('domaines.index')->with('success','Domaine ajouté avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine $domaine)
    {
        $item = Domaine::findOrFail($domaine)->first();
        
        return view('handi-admin.admindomaine.show',compact('item'));
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
        
        return view('handi-admin.admindomaine.edit',compact('item'));
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
        
        
        $ledomaine = Domaine::find($domaine)->first();
       $validatedDomaines = $request->validated();

       $ledomaine->libelle = $validatedDomaines['libelle'];
        $ledomaine->description = $validatedDomaines['description'];
        $ledomaine->save();
        
        //$domaine->update($request->validated());
        return redirect()->route('domaines.index')->with('success','Domaine modifié avec succès');
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
        if( $ledomaine->indicateurs()->count() > 0)
        {
            return redirect()->route('domaines.index')
            ->with('error','Veuillez supprimer d"abord les indicateurs de ce domaine');

        }

        $ledomaine->delete();
        return redirect()->route('domaines.index')->with('success','Domaine supprimé avec succès');


    }
}
