<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Campaign;

class RunCampaignNow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:run {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run emails sending for the campaign';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');

        $campaign = Campaign::runCampaign($id);
    }
}
