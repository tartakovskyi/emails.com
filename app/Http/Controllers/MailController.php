<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Send;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{

	public function index(Request $request)
	{
		dd($id);
		Send::run($id);
	}
} 

