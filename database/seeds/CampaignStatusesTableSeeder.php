<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CampaignStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (['New', 'In process', 'Completed'] as $value) {
    		DB::table('campaign_statuses')->insert([
    			'status_name' => $value,
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now()
    		]);
    	}
    }

}
