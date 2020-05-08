<?php

namespace App\Http\Controllers;

use App\TypeHandicap;
use App\Http\Requests\TypeHandicapRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeHandicapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TypeHandicap::paginate(config('app.nbr_page'));
        $nbrItems = DB::table('type_handicaps')->count();
     return view('handi-admin.admintypehandicap.index',compact('items','nbrItems'));    
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('handi-admin.adminlangue.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeHandicapRequest $request)
    {
        TypeHandicap::create($request->validated());
        return redirect()->route('typehandicaps.index')->with('success','Type de handicap  ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function show(TypeHandicap $typeHandicap)
    {
        
        $item = TypeHandicap::findOrFail($typeHandicap)->first();
        
        
        return view('handi-admin.admintypehandicap.show',compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeHandicap $typeHandicap)
    {
        $item = TypeHandicap::findOrFail($typeHandicap)->first();
        
        return view('handi-admin.admintypehandicap.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeHandicap $typeHandicap)
    {
        $letype = TypeHandicap::find($typeHandicap)->first();

        $letype->libelle = request('libelle');
        $letype->description = request('description');
        $letype->save();
        
        //$langue->update($request->validated());
        return redirect()->route('typehandicaps.index')->with('success','Type de handicap modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeHandicap $typeHandicap)
    {
        $letype = TypeHandicap::find($typeHandicap)->first();

        $letype->delete();
        return redirect()->route('typehandicaps.index')->with('Success','Type de handicap supprimé avec succès');
    }
}
