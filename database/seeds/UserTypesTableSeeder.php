<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Admin', 'User'] as $value) {
    		DB::table('user_types')->insert([
    			'name' => $value,
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now()
    		]);
    	}
    }
}
