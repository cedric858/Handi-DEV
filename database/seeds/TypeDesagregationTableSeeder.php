<?php

use Illuminate\Database\Seeder;
use App\TypeDesagregation;

class TypeDesagregationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeDesagregation::create([
            'libelle'=>'Par type de handicap'
            ]);
       TypeDesagregation::create([
                'libelle'=>'Par sexe'
                ]);
     TypeDesagregation::create([
                    'libelle'=>'Par région'
                    ]);
     TypeDesagregation::create([
                        'libelle'=>'Par tranche d\'âge'
                        ]);
      TypeDesagregation::create([
                            'libelle'=>'Par domaine d\'intervention'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par niveau d\'éducation'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par statut de l\'établissement'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par degrés d\'invalidité'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de diplôme'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de centre de formation'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type d\'emploi'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par statut de structure'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de personnel'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de domaine de prise en charge'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de formation sanitaire'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de maladie'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de d\'aide'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de TIC'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par domaine sportif'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de responsabilité'
                            ]);
      TypeDesagregation::create([
                            'libelle'=>'Par type de catastrophe'
                            ]);














                            
    
        

    }
}
