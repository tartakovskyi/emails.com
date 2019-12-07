<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{

	public function getRecipients () {
		return $this->leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'group_id', 'status', 'group_name')
		->get()
		->toArray();
	}

	public function getRecipientInfo ($id) {
		return $this->leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'group_id', 'status', 'group_name')
		->find($id)
		->toArray();
	}


}
