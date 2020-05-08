<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  new User;
        $user->name = 'The admin';
        $user->email = 'cedricsanou858@gmail.com';
        $user->password = bcrypt('adminadmin12345');
        $user->save();
        $user->roles()->attach(Role::where('name','user')->first());

        $admin = new User;
        $admin->name = 'Ouédraogo Abdel ';
        $admin->email = 'abdelweb.1234@gmail.com';
        $admin->password = bcrypt('useruser1234');
        $admin->save();
        $admin->roles()->attach(Role::where('name','user')->first());


    }
}
