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

	public function updateRecipient ($data) {
		$recipient = $this::find($this->ID);
		$recipient['email'] = $data['email'];
		$recipient['first_name'] = $data['first_name'];
		$recipient['last_name'] = $data['last_name'];
		$recipient['group_id'] = $data['group_id'];
		$recipient['status'] = $data['status'];
		$recipient->save();
		return $data;
	}


}
