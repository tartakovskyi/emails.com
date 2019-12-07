<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;
use App\Group;

class RecipientsСontroller extends Controller
{

	public function indexAction() {
		$recipients = new Recipient;
		$recArr = $recipients->getRecipients();
		return view('recipients', ['recArr' => $recArr, 'metaTitle' => 'Recipients list', 'title' => 'Recipients']);
	}

	public function editAction($id) {
		$recipient = new Recipient;
		$recInfo = $recipient->getRecipientInfo($id);

		$groups = new Group;
		$groupsArr = $groups->getGroupList($id);

		return view('recipient', ['recipient' => $recInfo, 'groups' => $groupsArr, 'metaTitle' => 'Recipient information', 'title' => 'Recipient information']);
	}
    
}
