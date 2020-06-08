<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Http\Requests\CommuneRequest;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = "communes";
        if(request('province'))
        {
            
            $items =   Commune::where('province_id',request('province'))->get()->sortBy("libelle");
            $province = 1;
            

        }
        else
        {
            $items = Commune::orderBy("libelle")->paginate(config('app.nbr_page'));
            

        }
        $nbrItems = DB::table('communes')->count();
        if(isset($province))
        {
            return view('handi-admin.admincommune.index',compact('active','items','nbrItems','province'));


        }
     return view('handi-admin.admincommune.index',compact('active','items','nbrItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "communes";
        return view('handi-admin.admincommune.add',
        ['active'=>$active,'provinces'=>Province::all()->sortBy("libelle")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommuneRequest $request)
    {
        $active = "communes";
        Commune::create($request->validated());
        return redirect()->route('communes.index',['active'=>$active])->with('success','Commune ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        
        $active = "communes";
        return view('handi-admin.admincommune.show', compact('active','commune'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        
         $provinces= Province::all()->sortBy("libelle");

        $active = "communes";
        
        
        return view('handi-admin.admincommune.edit',['active'=>$active,'commune'=>$commune,
        'provinces'=>$provinces]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function update(CommuneRequest $request, Commune $commune)
    {
        $active = "communes";
        $valid = $request->validated();
        $commune->province_id = $valid['province_id']; 

        $commune->libelle = $valid['libelle'];
        
        $commune->save();
        return redirect()->route('communes.index',['active'=>$active])->with('success','Commune modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commune $commune)
    {
        $active = "communes";
        //$item = Region::find($commune)->first();
        $commune->delete();
        return redirect()->route('communes.index',['active'=>$active])->with('Success','Commune supprimée avec succès');
    }
}
