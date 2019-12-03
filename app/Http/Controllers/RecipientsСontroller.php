<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;

class RecipientsСontroller extends Controller
{

	public function indexAction($request = null) {
		return view('recipients');
	} 
    
}
