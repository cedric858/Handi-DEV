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
        $regions = Region::all();
        $ophs = Oph::all();



        return view('handi-admin.index',compact('indicateurs','regions','oph'));
    }
}
