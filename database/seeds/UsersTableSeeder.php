<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname' => 'Sid Apple',
            'email'    => 'sid@mail.com',
            'password' => \bcrypt('password'),
            'address'  => 'Perth',
            'mobile'   => '0424070425',

        ]);
    }
}
