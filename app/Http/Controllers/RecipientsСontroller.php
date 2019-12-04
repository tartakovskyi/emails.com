<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;

class RecipientsСontroller extends Controller
{

	public function indexAction() {
		$recipients = new Recipient;
		$recArr = $recipients->getRecipients()->toArray();
		return view('recipients', ['recArr' => $recArr]);

		/*echo '<table>';
		foreach ($recArr as $recipient) {
			echo '<tr>';
			foreach ($recipient as $prop) {
				echo '<td>'.$prop.'</td>';
			}
			echo '</tr>';
		}
		echo '</table>';*/
		//return view('recipients');
	} 
    
}
