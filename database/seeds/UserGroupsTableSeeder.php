<?php

use Illuminate\Database\Seeder;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Admin', 'User'] as $value) {
    		DB::table('campaign_statuses')->insert([
    			'name' => $value,
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now()
    		]);
    	}
    }
}
