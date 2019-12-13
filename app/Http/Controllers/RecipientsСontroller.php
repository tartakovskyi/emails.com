<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;
use App\Group;

class RecipientsСontroller extends Controller
{

	public function index() {
		/*$recipients = new Recipient;
		$recArr = $recipients->getRecipients();*/

		$groupsArr = Group::get()->toArray();

		return view('recipient_list', [/*'recArr' => $recArr,*/ 'groups' => $groupsArr, 'metaTitle' => 'Recipients list', 'title' => 'Recipients']);
	}

	public function add() {
		$groupsArr = Group::get()->toArray();

		return view('recipient', ['recipient' => null, 'groups' => $groupsArr, 'metaTitle' => 'Add new recipient', 'title' => 'Add New Recipient']);
	}

	public function edit($id) {
		$recipient = new Recipient;
		$recInfo = $recipient->getRecipientInfo($id);

		$groupsArr = Group::get()->toArray();

		return view('recipient', ['recipient' => $recInfo, 'groups' => $groupsArr, 'metaTitle' => 'Recipient information', 'title' => 'Recipient Information']);
	}
    
}
