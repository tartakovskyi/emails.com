<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
	public function getRecipients () {
		$recipients = $this->select('email', 'first_name', 'last_name', 'group_id', 'status')->get()->toArray();
		foreach (&$recipients as $recipient) {
			$recipient['name'] = $recipient['last_name'].', '.$recipient['first_name'];
			unset($recipient['last_name']);
			unset($recipient['first_name']);
		}
		return $recipients;
	}
    
}
