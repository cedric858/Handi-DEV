<?php

namespace App\Http\Controllers;

use App\Cheflieu;
use App\Http\Requests\ProvinceRequest;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbrItems = DB::table('provinces')->count();
        if(request('cheflieu'))
        {
            
            $items =   Province::where('cheflieu_id',request('cheflieu'))->get()->sortBy("libelle");
            $cheflieu = 1;
            

        }
        else
        {
            $items = Province::orderBy("libelle")->paginate(config('app.nbr_page'));
            

        }
        
        if(isset($cheflieu))
        {
            
            return view('handi-admin.adminprovinces.index',compact('items','nbrItems','region'));


        }


        //////////////////////////////////////////////
     return view('handi-admin.adminprovince.index',compact('items','nbrItems'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('handi-admin.adminprovince.add',['cheflieus'=>Cheflieu::all()->sortBy("libelle")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        Province::create($request->validated());
        return redirect()->route('provinces.index')->with('success','Province ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        
         return view('handi-admin.adminprovince.show', compact('province'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
       
         $cheflieus= Cheflieu::all()->sortBy("libelle");
        
        return view('handi-admin.adminprovince.edit',compact('province','cheflieus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, Province $province)
    {
        $valid = $request->validated();
        
        //return redirect()->route('cheflieus.index')->with('success','Chef-lieu ajouté avec succès');

       // $item = Cheflieu::find($cheflieus)->first();

        
        $province->cheflieu_id = $valid['cheflieu_id']; 

        $province->libelle = $valid['libelle'];
        
        $province->save();
        
        //$domaine->update($request->validated());
        return redirect()->route('provinces.index')->with('success','Province modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //$item = Region::find($cheflieus)->first();
        if( $province->communes->count() > 0)
        {
            return redirect()->route('provinces.index')
            ->with('error','Veuillez supprimer d"abord les communes de cette province');

        }
        

        $province->delete();
        return redirect()->route('provinces.index')->with('Success','province supprimée avec succès');
    }
}
