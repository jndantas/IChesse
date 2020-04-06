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
            'name' => 'Jailton Dantas',
            'email' => 'jailton.dantass@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
