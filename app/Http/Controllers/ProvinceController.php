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
        $active = "provinces";
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
            
            return view('handi-admin.adminprovinces.index',compact('active','items','nbrItems','region'));


        }


        //////////////////////////////////////////////
     return view('handi-admin.adminprovince.index',compact('active','items','nbrItems'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "provinces";
        

        return view('handi-admin.adminprovince.add',['active'=>$active,'cheflieus'=>Cheflieu::all()->sortBy("libelle")
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
        $active = "provinces";
        Province::create($request->validated());
        return redirect()->route('provinces.index',['active'=>$active])->with('success','Province ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        $active = "provinces";
        
         return view('handi-admin.adminprovince.show', compact('active','province'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $active = "provinces";
       
         $cheflieus= Cheflieu::all()->sortBy("libelle");
        
        return view('handi-admin.adminprovince.edit',compact('active','province','cheflieus'));
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
        $active = "provinces";
        $valid = $request->validated();
        
        //return redirect()->route('cheflieus.index')->with('success','Chef-lieu ajouté avec succès');

       // $item = Cheflieu::find($cheflieus)->first();

        
        $province->cheflieu_id = $valid['cheflieu_id']; 

        $province->libelle = $valid['libelle'];
        
        $province->save();
        
        //$domaine->update($request->validated());
        return redirect()->route('provinces.index',['active'=>$active])->with('success','Province modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $active = "provinces";
        //$item = Region::find($cheflieus)->first();
        if( $province->communes->count() > 0)
        {
            return redirect()->route('provinces.index',['active'=>$active])
            ->with('error','Veuillez supprimer d"abord les communes de cette province');

        }
        

        $province->delete();
        return redirect()->route('provinces.index',['active'=>$active])->with('Success','province supprimée avec succès');
    }
}
