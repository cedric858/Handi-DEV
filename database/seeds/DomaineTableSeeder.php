<?php

use Illuminate\Database\Seeder;
use App\Domaine;
class DomaineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Domaine::create([
            'libelle'=>'Protection et promotion de l’enfant handicapé'
            ]);
        Domaine::create([
                'libelle'=>'Protection et promotion de la femme handicapée'
                ]);
        Domaine::create([
                    'libelle'=>'Education'
                    ]);
        Domaine::create([
                    'libelle'=>'Formation, du travail et de l\’emploi'
                    ]);
        Domaine::create([
                    'libelle'=>'Santé, adaptation et réadaptation'
                    ]);
        Domaine::create([
                    'libelle'=>'Accessibilité physique, à l\’information, à la communication et aux transport'
                    ]);
        Domaine::create([
                    'libelle'=>'Egalité de la non-discrimination et de la sensibilisation'
                    ]);
        Domaine::create([
                    'libelle'=>'Participation à la vie culturelle et récréative aux loisirs et aux sports'
                    ]);
        Domaine::create([
                    'libelle'=>'Justice, liberté et sécurité'
                    ]);
        Domaine::create([
                    'libelle'=>'Mobilité personnelle, autonomie de vie et niveau de vie adéquat, respect de vie, vie familiale'
                    ]);
        Domaine::create([
                    'libelle'=>'Participation à la vie publique et politique'
                    ]);

    }
}
