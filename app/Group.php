<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public static function getGroupList ($data) {

		return self::all()->whereIn('group_status', $data['status'])->toArray();
	}

	public static function getGroupNames () {
		return self::select('id', 'group_name')->get()->toArray();
	}
}
