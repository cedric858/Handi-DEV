<?php

namespace App\Http\Controllers;

use App\Cheflieu;
use App\Commune;
use App\Indicateur;
use App\Langue;
use App\Oph;
use App\Province;
use App\Region;
use App\TypeHandicap;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $indicateurs = Indicateur::all();
        $regions = Region::all();
        $ophs = Oph::all();
        $cheflies = Cheflieu::all();
        $provinces = Province::all();
        $communes = Commune::all();
        $handicaps = TypeHandicap::all();
        $langues = Langue::all();



        return view('handi-admin.index',compact('indicateurs','regions','ophs','cheflies','provinces','communes','handicaps','langues'));
    }
}
