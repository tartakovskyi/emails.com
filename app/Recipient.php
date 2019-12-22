<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;



class Recipient extends Model
{

	protected $fillable = ['email', 'first_name', 'last_name', 'group_id', 'status'];

	public static function getRecipients ($data) {
		return self::leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'status', 'group_id', 'status', 'group_name')
		->whereIn('status', $data['status'])
		->whereIn('group_id', $data['group_id'])
		->get()
		->toArray();
	}

	public static function getRecipientsByGroups () {
		$query = self::join('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email','group_id','group_name')
		->where('status', 1)
		->where('group_status', 1)
		->get();

		$count = $query->count();
		$list = $query->groupBy('group_name')->toArray();

		return ['count' => $count, 'list' => $list];
	}

	public function getRecipientInfo ($id) {
		return $this->leftJoin('groups', 'recipients.group_id', '=', 'groups.id')
		->select('recipients.id', 'email', 'first_name', 'last_name', 'status', 'group_id',  'group_name')
		->find($id)
		->toArray();
	}

	public function saveRecipient ($data, $id = null) {
		$recipient = $id ? self::find($id) : new Recipient;
		$recipient->fill($data);
		$recipient->save();
	}

	public static function countRecipients ($id) {
		return self::where('group_id', $id)->count();
	}

}
