<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{

	public function getRecipients ($data) {
		return $this->leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'group_id', 'status', 'group_name')
		->whereIn('status', $data['status'])
		->whereIn('group_id', $data['group_id'])
		->get()
		->toArray();
	}

	public function getRecipientInfo ($id) {
		return $this->leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'group_id', 'status', 'group_name')
		->find($id)
		->toArray();
	}

	public function insertRecipient ($data) {
		$recipient = new Recipient;
		$recipient->email = $data['email'];
		$recipient->first_name = $data['first_name'];
		$recipient->last_name = $data['last_name'];
		$recipient->group_id = $data['group_id'];
		$recipient->status = $data['status'];
		$recipient->save();
	}

	public function updateRecipient ($id, $data) {
		$recipient = $this::find($id);
		$recipient->email = $data['email'];
		$recipient->first_name = $data['first_name'];
		$recipient->last_name = $data['last_name'];
		$recipient->group_id = $data['group_id'];
		$recipient->status = $data['status'];
		$recipient->save();
	}

}
