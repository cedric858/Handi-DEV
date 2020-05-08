<?php

namespace App\Http\Controllers;

use App\TypeDesagregation;
use Illuminate\Http\Request;

class TypeDesagregationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TypeDesagregation::paginate(config('app.nbr_page'));
        return view('handi-admin.admintypedesagregation.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeDesagregation  $typeDesagregation
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDesagregation $typeDesagregation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeDesagregation  $typeDesagregation
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeDesagregation $typeDesagregation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeDesagregation  $typeDesagregation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDesagregation $typeDesagregation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeDesagregation  $typeDesagregation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDesagregation $typeDesagregation)
    {
        //
    }
}
