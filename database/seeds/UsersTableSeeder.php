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
        User::insert([
        	'name' => 'admin',
        	'email' => 'test@test.com',
        	'password' => bcrypt('123456'),
            'type_id' => 0
    		]);
    }
}
