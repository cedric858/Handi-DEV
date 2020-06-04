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
        $active = 'handicap';
        $items = TypeHandicap::orderBy("libelle")->paginate(config('app.nbr_page'));
        $nbrItems = DB::table('type_handicaps')->count();
     return view('handi-admin.admintypehandicap.index',compact('active','items','nbrItems'));    
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'handicap';
        return view('handi-admin.admintypehandicap.add',compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeHandicapRequest $request)
    {
        $active = 'handicap';
        TypeHandicap::create($request->validated());
        return redirect()->route('typehandicaps.index',['active'=>$active])->with('success','Type de handicap  ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function show(TypeHandicap $typehandicap)
    {
        dd($typehandicap);
        
        $active = 'handicap';
        
        $item = TypeHandicap::findOrFail($typehandicap);
        dd($item);
        
        
        
        
        return view('handi-admin.admintypehandicap.show',compact('active','item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function edit( $typeHandicap)
    {
        $active = 'handicap';
        $item = TypeHandicap::findOrFail($typeHandicap)->first();
        
        return view('handi-admin.admintypehandicap.edit',compact('active','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $typeHandicap)
    {
        $active = 'handicap';
        $letype = TypeHandicap::find($typeHandicap)->first();

        $letype->libelle = request('libelle');
        $letype->description = request('description');
        $letype->save();
        
        //$langue->update($request->validated());
        return redirect()->route('typehandicaps.index',['active'=>$active])->with('success','Type de handicap modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeHandicap  $typeHandicap
     * @return \Illuminate\Http\Response
     */
    public function destroy( $typeHandicap)
    {
        $letype = TypeHandicap::find($typeHandicap)->first();

        $letype->delete();
        $active = 'handicap';
        return redirect()->route('typehandicaps.index',['active'=>$active])->with('Success','Type de handicap supprimé avec succès');
    }
}
