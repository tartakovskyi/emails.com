<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

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
            'type_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
    		]);

        $users = factory(App\User::class, 6)->create();
    }
}
