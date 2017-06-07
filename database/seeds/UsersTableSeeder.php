<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_one = new User();
        $user_one->role_id = '1';
        $user_one->name = 'Olo Choj';
        $user_one->email = 'olo@wp.pl';
        $user_one->password = bcrypt('subhumans');

        $user_one->save();
    }
}
