<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Recipient;
use App\Group;
use App\CampaignRecipients;
use App\Campaign;

class CampaignController extends Controller
{
	public function index () {

		$statuses = DB::table('campaign_statuses')->get()->toArray();

		$data = ['entity' => 'campaign', 'list' => true, 'statuses' => $statuses];

		return view('campaign_list', $data);
	}

	public function edit($id = null) {

		$campaignInfo = null;

		if ($id) {
			$campaign = new Campaign;
			$campaignInfo = $campaign->getCampaignInfo($id);
		}

		$recipients = Recipient::getRecipientsByGroups($id);

		$groups = Group::getGroupNames();

		$data = ['campaign' => $campaignInfo, 'recipients' => $recipients, 'groups' => $groups, 'entity' => 'campaign'];

		return view('campaign', $data);
	}

	public function filter(Request $request) {

		$campArr = Campaign::getCampaignList($request->toArray());

		return view('campaign_table', ['campArr' => $campArr]);
	}

	public function send($id)
	{
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

		return view('thank_you', ['campName' => $campaignInfo['camp_name']]);
	}
}
