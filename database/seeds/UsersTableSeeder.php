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
       $user1 =  User::create([
            'name' => 'Miloš Marković',
            'email' => 'milos@gmail.com',
            'password' => bcrypt('secret'),
            'img' => 'Milos.jpg',
            'usertype' => 1
        ]);

       $user2 =  User::create([
            'name' => 'Đorđe Marković',
            'email' => 'đoka@gmail.com',
            'password' => bcrypt('secret'),
            'img' => 'Djordje.jpg'
        ]);
    }
}
