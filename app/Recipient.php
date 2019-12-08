<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
	private $ID;

	public function __construct ($id = null) {
		$this->ID = $id;
	}

	public function getRecipients () {
		return $this->leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'group_id', 'status', 'group_name')
		->get()
		->toArray();
	}

	public function getRecipientInfo () {
		return $this->leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'group_id', 'status', 'group_name')
		->find($this->ID)
		->toArray();
	}

	public function updateRecipient () {
		$recipient = $this::find($this->ID);
		// $data = $request;
		// return print_r($data);
	}


}
