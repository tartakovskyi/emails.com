<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Recipient;
use App\Group;

class RecipientsСontroller extends Controller
{

	public function index() {
		$groupArr = Group::getGroupList(['id','group_name']);

		$data = ['groups' => $groupArr, 'metaTitle' => 'Recipients list', 'title' => 'Recipients'];

		return view('recipient_list', $data);
	}

	public function edit($id = null) {

		$recInfo = null;

		if ($id) {
			$recipient = new Recipient;
			$recInfo = $recipient->getRecipientInfo($id);
		}

		$groupArr = Group::getGroupList(['id','group_name']);

		$title = $id ? 'Recipient information' : 'Add new recipient';

		$data = ['recipient' => $recInfo, 'groups' => $groupArr, 'metaTitle' => $title, 'title' => $title];

		return view('recipient', $data);
	}



	public function filter(Request $request) {
		$recArr = Recipient::getRecipients($request->toArray());

		return view('recipient_table', ['recArr' => $recArr]);
	}

}
