<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Recipient;
use App\Group;

class RecipientsСontroller extends Controller
{

	public function index() {
		$groupArr = Group::getGroupNames();

		$data = ['groups' => $groupArr, 'metaTitle' => 'Recipients list', 'title' => 'Recipients', 'entity' => 'recipient', 'list' => true];

		return view('recipient_list', $data);
	}

	public function edit($id = null) {

		$recInfo = null;

		if ($id) {
			$recipient = new Recipient;
			$recInfo = $recipient->getRecipientInfo($id);
		}

		$groupArr = Group::getGroupNames();

		$title = $id ? 'Recipient information' : 'Add new recipient';

		$data = ['recipient' => $recInfo, 'groups' => $groupArr, 'metaTitle' => $title, 'title' => $title, 'entity' => 'recipient'];

		return view('recipient', $data);
	}



	public function filter(Request $request) {
		$recArr = Recipient::getRecipients($request->toArray());

		return view('recipient_table', ['recArr' => $recArr]);
	}

}
