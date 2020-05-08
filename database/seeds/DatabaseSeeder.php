<?php

use App\TypeDesagregation;
use App\TypeHandicap;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([DomaineTableSeeder::class,
        LangueTableSeeder::class,
        RegionTableSeeder::class,
        TypeHandicapTableSeeder::class,
        TypeDesagregationTableSeeder::class,
        UserTableSeeder::class,
        RoleTableSeeder::class]);
        
    }
}
