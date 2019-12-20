<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;
use App\Campaign;

class CampaignController extends Controller
{
    public function index () {

		$data = ['entity' => 'campaign', 'list' => true];

		return view('campaign_list', $data);
	}

	public function edit($id = null) {

		$groupInfo = null;

		if ($id) {
			$campaign = new Campaign;
			$campaignInfo = $campaign->getCampaignInfo($id);
		}

		$recipients = Recipient::countRecipients($id);

		$title = $id ? 'Campaign information' : 'Add new campaign';

		$data = ['campaign' => $campaignInfo, 'recipients' => $recipients, 'entity' => 'campaign'];

		return view('campaign', $data);
	}

	public function filter(Request $request) {

		$campArr = Campaign::getCampaignList($request->toArray());

		return view('campaign_table', ['campArr' => $campArr]);
	}
}
