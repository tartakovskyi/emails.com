<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{

	public function index()
	{

		Mail::send([], [], function ($m)  {
			$campaign = Campaign::find(1)->toArray();
			$m->from('hello@app.com', 'Laravel');

			$m->to('vvt2001@ukr.net', 'Volodymyr')->subject('Your Reminder!')->setBody('test');;
		});

		echo 'success';
	}
} 

