<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionRequest;
use App\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Region::paginate(config('app.nbr_page'));
        $nbrItems = DB::table('regions')->count();
     return view('handi-admin.adminregion.index',compact('items','nbrItems'));
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
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        
        $item = Region::findOrFail($region)->first();
        
        
        return view('handi-admin.adminregion.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {

        $item = Region::findOrFail($region)->first();
        
        return view('handi-admin.adminregion.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, Region $region)
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
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
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
