<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{

	public function index()
	{

		Mail::send('emails.email', [], function ($m)  {
			$m->from('hello@app.com', 'Your Application');

			$m->to('vvt2001@ukr.net', 'Volodymyr')->subject('Your Reminder!');
		});

		echo 'success';
	}
} 

