<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RecipientsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(CampaignsTableSeeder::class);
        $this->call(CampaignStatusesTableSeeder::class);
    }
}
