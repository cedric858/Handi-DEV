<?php

namespace App\Http\Controllers;

use App\Indicateur;
use App\Oph;
use App\Region;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $indicateurs = Indicateur::all()->take(6);
        $regions = Region::all()->take(6);
        $ophs = Oph::all()->take(6);



        return view('handi-admin.index',compact('indicateurs'));
    }
}
