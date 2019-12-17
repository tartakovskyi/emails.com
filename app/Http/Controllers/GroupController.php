<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;
use App\Group;

class GroupController extends Controller
{
	public function index () {

		$data = ['metaTitle' => 'Groups of the recipients', 'title' => 'Groups of the recipients', 'list' => 'group'];

		return view('group_list', $data);
	}

	public function edit($id = null) {

		$groupInfo = null;

		if ($id) {
			$group = new Group;
			$groupInfo = $group->getGroupInfo($id);
		}

		$recipients = Recipient::countRecipients($id);

		$title = $id ? 'Group information' : 'Add new group';

		$data = ['group' => $groupInfo, 'metaTitle' => $title, 'title' => $title, 'recipients' => $recipients];

		return view('group', $data);
	}

	public function filter(Request $request) {

		$groupArr = Group::getGroupList($request->toArray());

		return view('group_table', ['groupArr' => $groupArr]);
	}
}
