<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = ['group_name', 'group_description', 'last_name', 'group_status'];

    public static function getGroupList ($data) {

		return self::all()->whereIn('group_status', $data['status'])->toArray();
	}

	public static function getGroupNames () {
		return self::select('id', 'group_name')->get()->pluck('group_name','id')->toArray();
	}

	public function getGroupInfo ($id) {
		return $this->find($id)->toArray();
	}

	public function saveGroup ($data, $id = null) {
		$recipient = ($id) ? self::find($id) : new Group;
		$recipient->fill($data);
		$recipient->save();
	}
}
