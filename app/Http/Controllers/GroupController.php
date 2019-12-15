<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function index () {

    	$data = ['metaTitle' => 'Groups of the recipients', 'title' => 'Groups of the recipients'];

    	return view('group_list', $data);
    }

    public function filter(Request $request) {

		$groupArr = Group::getGroupList(['id','group_name']);

		return view('group_table', ['groupArr' => $groupArr]);
	}
}
