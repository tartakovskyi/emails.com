<?php

use Illuminate\Database\Seeder;
use App\Recipient;

class RecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users = factory(App\Recipient::class, 50)->create();
    }
}
