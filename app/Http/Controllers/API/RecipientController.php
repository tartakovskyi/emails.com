<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipient;

class RecipientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function update($id, $data) {
        $recipient = new Recipient($id);
        //$test = $recipient->updateRecipient(Request $request);
        //echo $test;
        dd($data);

    }
}
