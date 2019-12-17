<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
	public function index () {

		$data = ['metaTitle' => 'Groups of the recipients', 'title' => 'Groups of the recipients', 'list' => 'group'];

		return view('group_list', $data);
	}

	public function filter(Request $request) {

		$groupArr = Group::getGroupList($request->toArray());

		return view('group_table', ['groupArr' => $groupArr]);
	}
}
