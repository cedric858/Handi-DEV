<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $region = new Region;
        $region->libelle = "Boucle du Mohoun";
        $region->save();

        $region = new Region;
        $region->libelle = "Cascades";
        $region->save();

        $region = new Region;
        $region->libelle = "Centre";
        $region->save();

        $region = new Region;
        $region->libelle = "Centre-Est";
        $region->save();

        $region = new Region;
        $region->libelle = "Centre-Nord";
        $region->save();

        $region = new Region;
        $region->libelle = "Centre-Ouest";
        $region->save();

        $region = new Region;
        $region->libelle = "Centre-Sud";
        $region->save();

        $region = new Region;
        $region->libelle = "Hauts-Bassin";
        $region->save();

        $region = new Region;
        $region->libelle = "Nord";
        $region->save();

        $region = new Region;
        $region->libelle = "Sahel";
        $region->save();

        $region = new Region;
        $region->libelle = "Sud-Ouest";
        $region->save();
    }
}
