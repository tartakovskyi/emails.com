<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;
use App\Group;
use App\Campaign;

class CampaignController extends Controller
{
    public function index () {

		$data = ['entity' => 'campaign', 'list' => true];

		return view('campaign_list', $data);
	}

	public function edit($id = null) {

		$campaignInfo = null;

		if ($id) {
			$campaign = new Campaign;
			$campaignInfo = $campaign->getCampaignInfo($id);
		}

		$recipients = Recipient::getRecipientsByGroups();

		$groups = Group::getGroupNames();

		$data = ['campaign' => $campaignInfo, 'recipients' => $recipients, 'groups' => $groups, 'entity' => 'campaign'];

		return view('campaign', $data);
	}

	public function filter(Request $request) {

		$campArr = Campaign::getCampaignList($request->toArray());

		return view('campaign_table', ['campArr' => $campArr]);
	}
}
