<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;

class UserController extends Controller
{
    public function index() 
    {
    	$types = UserType::all();

		$data = ['entity' => 'user', 'types' => $types, 'list' => true];

		return view('user_list', $data);
	}


	public function edit($id = null) 
	{

		$userInfo = $id ? User::find($id) : null;

		$userTypes = UserType::all();

		$data = ['user' => $userInfo, 'types' => $userTypes,  'entity' => 'user'];

		return view('user', $data);
	}

	public function filter(Request $request) {

		$users = User::with('type')->get();

		return view('user_table', ['users' => $users]);
	}
}
