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
    
}
