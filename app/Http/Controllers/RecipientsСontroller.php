<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Recipient;
use App\Group;

class RecipientsСontroller extends Controller
{

	public function index(Request $request) {
		$groupArr = Group::getGroupNames();

		$data = ['groups' => $groupArr, 'entity' => 'recipient', 'id' => $request->id, 'list' => true];

		return view('recipient_list', $data);
	}

	public function edit($id = null) {

		$recInfo = null;

		if ($id) {
			//$recipient = new Recipient;
			//$recInfo = $recipient->getRecipientInfo($id);
			$recipient = Recipient::find($id);
			$recipient->group_name = $recipient->group->group_name;
		}

		dd($recipient);

		$groupArr = Group::getGroupNames();

		$title = $id ? 'Recipient information' : 'Add new recipient';

		$data = ['recipient' => $recInfo, 'groups' => $groupArr, 'entity' => 'recipient'];

		return view('recipient', $data);
	}



	public function filter(Request $request) {
		$recArr = Recipient::getRecipients($request->toArray());

		return view('recipient_table', ['recArr' => $recArr]);
	}

}
