<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;
use App\Group;

class RecipientsСontroller extends Controller
{

	public function index() {
		$recipients = new Recipient;
		$recArr = $recipients->getRecipients();
		return view('recipients', ['recArr' => $recArr, 'metaTitle' => 'Recipients list', 'title' => 'Recipients']);
	}

	public function edit($id) {
		$recipient = new Recipient($id);
		$recInfo = $recipient->getRecipientInfo();

		$groups = new Group;
		$groupsArr = $groups->getGroupList($id);

		return view('recipient', ['recipient' => $recInfo, 'groups' => $groupsArr, 'metaTitle' => 'Recipient information', 'title' => 'Recipient information']);
	}
    
}
