<?php

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
        DB::table('users')->insert([
           'name' => "Bob",
           'email' => 'Bob@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '22/01/2001',
           'profileImage' => 'users_images/boy.svg',
        ]);
        DB::table('users')->insert([
           'name' => "John",
           'email' => 'John@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '04/05/1992',
           'profileImage' => 'users_images/boy.svg',
        ]);
        DB::table('users')->insert([
           'name' => "Tom",
           'email' => 'Tom@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '12/09/1982',
           'profileImage' => 'users_images/boy.svg',
        ]);
        DB::table('users')->insert([
           'name' => "PO",
           'email' => 'PO@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '04/09/1994',
           'profileImage' => 'users_images/boy.svg',
        ]);
        DB::table('users')->insert([
           'name' => "Tim",
           'email' => 'Tim@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '14/08/1995',
           'profileImage' => 'users_images/boy.svg',
        ]);
        DB::table('users')->insert([
           'name' => "Louis",
           'email' => 'Louis@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '18/08/1994',
           'profileImage' => 'users_images/boy.svg',
        ]);
        DB::table('users')->insert([
           'name' => "Dylan",
           'email' => 'Dylan@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '13/03/1993',
           'profileImage' => 'users_images/boy.svg',
        ]);
        DB::table('users')->insert([
           'name' => "Kenza",
           'email' => 'Kenza@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '23/07/1995',
           'profileImage' => 'users_images/girl.svg',
        ]);
        DB::table('users')->insert([
           'name' => "Raphaëlle",
           'email' => 'Raph@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '23/02/1995',
           'profileImage' => 'users_images/girl.svg',
        ]);
        DB::table('users')->insert([
           'name' => "Eugénie",
           'email' => 'Eugenie@a.org',
           'password' => bcrypt('1234'),
           'birthDate' => '03/10/1994',
           'profileImage' => 'users_images/girl.svg',
        ]);
    }
}
