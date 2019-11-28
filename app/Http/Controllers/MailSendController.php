<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailSendController extends Controller
{
	public function index() {
		$to_name = 'Volodymyr';
		$to_email = 'vvt2001@ukr.net';
		$data = array('name'=>'Volodymyr', 'body' => 'A test mail');
		Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
			$message->to($to_email, $to_name)
			->subject('Laravel Test Mail');
			$message->from('admin@emails.loc','Test Mail');
		});
	}
}
