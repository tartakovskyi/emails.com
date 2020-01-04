<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Campaign;
use App\CampaignRecipients;

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

        $recipients = CampaignRecipients::getCampaignRecipients($id);

        $campaign = Campaign::find($id);

        $campaignInfo = $campaign->getCampaignInfo($id);

        $campaign->started_at = Carbon::now();

        $campaign->camp_status = 2;

        $campaign->save();

        $campaign->send($campaignInfo, $recipients);

        $campaign->completed_at = Carbon::now();

        $campaign->camp_status = 3;

        $campaign->save();
    }
}
