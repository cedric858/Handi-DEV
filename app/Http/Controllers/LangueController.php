<?php

namespace App\Http\Controllers;

use App\Http\Requests\LangueRequest;
use App\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

      $items = Langue::orderBy("libelle")->paginate(config('app.nbr_page'));
      $nbrItems = DB::table('langues')->count();
   return view('handi-admin.adminlangue.index',compact('items','nbrItems'));    }

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
    public function store(LangueRequest $request)
    {
        Langue::create($request->validated());
        return redirect()->route('langues.index')->with('success','Langue ajoutée avec succès');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function show(Langue $langue)
    {
        $item = Langue::findOrFail($langue)->first();
        
        return view('handi-admin.adminlangue.show',compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function edit(Langue $langue)
    {
        $item = Langue::findOrFail($langue)->first();
        
        return view('handi-admin.adminlangue.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Langue $langue)
    {
        $lalangue = langue::find($langue)->first();

        $lalangue->libelle = request('libelle');
       // $lalangue->description = request('description');
        $lalangue->save();
        
        //$langue->update($request->validated());
        return redirect()->route('langues.index')->with('success','langue modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Langue $langue)
    {
        $lalangue = Langue::find($langue)->first();

        $lalangue->delete();
        return redirect()->route('langues.index')->with('Success','langue supprimée avec succès');
    }
}
