<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;

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
		return view('recipient', ['recipient' => $recInfo, 'metaTitle' => 'Recipient information', 'title' => 'Recipient information']);
	}
    
}
