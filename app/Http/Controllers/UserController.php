<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {

		$data = ['entity' => 'group', 'list' => true];

		return view('group_list', $data);
	}

	/*public function edit($id = null) {

		$groupInfo = null;

		if ($id) {
			$group = new Group;
			$groupInfo = $group->getGroupInfo($id);
		}

		$recipients = Recipient::countRecipients($id);

		$title = $id ? 'Group information' : 'Add new group';

		$data = ['group' => $groupInfo, 'recipients' => $recipients, 'entity' => 'group'];

		return view('group', $data);
	}

	public function filter(Request $request) {

		$groupArr = Group::getGroupList($request->toArray());

		return view('group_table', ['groupArr' => $groupArr]);
	}*/
}
