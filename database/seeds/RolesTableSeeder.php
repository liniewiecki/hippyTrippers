<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = new Role();
        $role_admin->name = 'Administrator';
        $role_admin->save();

        $role_subscriber = new Role();
        $role_subscriber->name = 'Subscriber';
        $role_subscriber->save();


    }
}
