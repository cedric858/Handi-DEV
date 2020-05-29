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
            return view('handi-admin.admincommune.index',compact('items','nbrItems','province'));


        }
     return view('handi-admin.admincommune.index',compact('items','nbrItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('handi-admin.admincommune.add',
        ['provinces'=>Province::all()->sortBy("libelle")
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
        Commune::create($request->validated());
        return redirect()->route('communes.index')->with('success','Commune ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commune $commune)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commune $commune)
    {
        //
    }
}
