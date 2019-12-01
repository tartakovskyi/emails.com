<?php

use Illuminate\Database\Seeder;

class RecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users = factory(App\Recipient::class, 25)->create();
    }
}
