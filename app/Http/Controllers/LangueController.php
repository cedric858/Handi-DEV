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
        $active = "langues";

      $items = Langue::orderBy("libelle")->paginate(config('app.nbr_page'));
      $nbrItems = DB::table('langues')->count();
   return view('handi-admin.adminlangue.index',compact('active','items','nbrItems'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "langues";

        return view('handi-admin.adminlangue.add',compact('active'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LangueRequest $request)
    {
        $active = "langues";

        Langue::create($request->validated());
        return redirect()->route('langues.index',['active'=>$active])->with('success','Langue ajoutée avec succès');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function show(Langue $langue)
    {
        $active = "langues";

        $item = Langue::findOrFail($langue)->first();
        
        return view('handi-admin.adminlangue.show',compact('active','item'));

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
        $active = "langues";

        return view('handi-admin.adminlangue.edit',compact('active','item'));
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
        $active = "langues";

        $lalangue = langue::find($langue)->first();

        $lalangue->libelle = request('libelle');
       // $lalangue->description = request('description');
        $lalangue->save();
        
        //$langue->update($request->validated());
        return redirect()->route('langues.index',["active"=>$active])->with('success','Langue modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Langue $langue)
    {
        $active = "langues";

        $lalangue = Langue::find($langue)->first();

        $lalangue->delete();
        return redirect()->route('langues.index',['active'=>$active])->with('Success','Langue supprimée avec succès');
    }
}
