<?php

namespace App\Http\Controllers;

use App\Region;
use App\Cheflieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheflieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cheflieu::paginate(config('app.nbr_page'));
        $nbrItems = DB::table('cheflieus')->count();
     return view('handi-admin.admincheflieu.index',compact('items','nbrItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('handi-admin.adminregion.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Region::create($request->validate([
            'libelle'=>'required'
        ]));
        return redirect()->route('regions.index')->with('success','Région ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cheflieu  cheflieu$cheflieu
     * @return \Illuminate\Http\Response
     */
    public function show(Cheflieu $cheflieu)
    {
        $item = Region::findOrFail($cheflieu)->first();
        
        return view('handi-admin.admincheflieu.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cheflieu  $cheflieu
     * @return \Illuminate\Http\Response
     */
    public function edit(Cheflieu $cheflieu)
    {
        $item = Region::findOrFail($cheflieu)->first();
        
        return view('handi-admin.admincheflieu.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cheflieu  $cheflieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cheflieu $cheflieu)
    {
        $item = Region::find($region)->first();

        $item->libelle = request('libelle');
        
        $item->save();
        
        //$domaine->update($request->validated());
        return redirect()->route('regions.index')->with('success','Région modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cheflieu  $cheflieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cheflieu $cheflieu)
    {
        $item = Region::find($region)->first();
        if( $item->cheflieu()->count() > 0)
        {
            return redirect()->route('regions.index')
            ->with('error','Veuillez supprimer d"abord le chef-lieu de cette région');

        }

        $item->delete();
        return redirect()->route('regions.index')->with('Success','Région supprimée avec succès');

    }
}
