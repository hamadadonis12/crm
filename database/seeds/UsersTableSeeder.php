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
        User::updateOrCreate(['email' => 'superadmin@worldwidetravel.com'], [
        	'first_name' => 'Admin',
        	'last_name' => 'Admin',
        	'is_superadmin' => 1,
        	'password' => bcrypt('123456')
        ]);
    }
}
