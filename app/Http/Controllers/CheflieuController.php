<?php

namespace App\Http\Controllers;
use App\Cheflieu;
use App\Region;
use App\Http\Requests\CheflieuRequest;
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
        $active = "cheflieu";
        if(request('region'))
        {
            
            $items =   Cheflieu::where('region_id',request('region'))->get()->sortBy("libelle");
            $region = 1;
            

        }
        else
        {
            $items = Cheflieu::orderBy("libelle")->paginate(config('app.nbr_page'));
            

        }
        $nbrItems = DB::table('cheflieus')->count();
        if(isset($region))
        {
            return view('handi-admin.admincheflieu.index',compact("active",'items','nbrItems','region'));


        }
     return view('handi-admin.admincheflieu.index',compact('active','items','nbrItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "cheflieu";
        return view('handi-admin.admincheflieu.add',['active'=>$active,'regions'=>Region::all()->sortBy("libelle")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheflieuRequest $request)
    {
        $active = "cheflieu";
        Cheflieu::create($request->validated());
        return redirect()->route('cheflieus.index',['active'=>$active])->with('success','Chef-lieu ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
        * @param  \App\Cheflieu  $cheflieu
     * @return \Illuminate\Http\Response
     */
    public function show(Cheflieu $cheflieus)
    {
        $active = "cheflieu";
        $cheflieu =$cheflieus;
        
         return view('handi-admin.admincheflieu.show', compact('active','cheflieu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cheflieu  $cheflieu
     * @return \Illuminate\Http\Response
     */
    public function edit(Cheflieu $cheflieus)
    {
        $active = "cheflieu";
        $cheflieu =$cheflieus;
         $regions= Region::all()->sortBy("libelle");
        
        return view('handi-admin.admincheflieu.edit',compact('active','cheflieu','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cheflieu  $cheflieu
     * @return \Illuminate\Http\Response
     */
    public function update(CheflieuRequest $request, Cheflieu $cheflieus)
    {
        $active = "cheflieu";
        $valid = $request->validated();
        
        //return redirect()->route('cheflieus.index')->with('success','Chef-lieu ajouté avec succès');

       // $item = Cheflieu::find($cheflieus)->first();

        
        $cheflieus->region_id = $valid['region_id']; 

        $cheflieus->libelle = $valid['libelle'];
        
        $cheflieus->save();
        
        //$domaine->update($request->validated());
        return redirect()->route('cheflieus.index',['active'=>$active])->with('success','chef-lieu modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cheflieu  $cheflieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cheflieu $cheflieus)
    {
        $active = "cheflieu";
        //$item = Region::find($cheflieus)->first();
        if( $cheflieus->provinces->count() > 0)
        {
            return redirect()->route('cheflieus.index',['active'=>$active])
            ->with('error','Veuillez supprimer d"abord les provinces de ce chef-lieu');

        }

        $cheflieus->delete();
        return redirect()->route('cheflieus.index',['active'=>$active])->with('Success','chef-lieu supprimé avec succès');

    }
}
