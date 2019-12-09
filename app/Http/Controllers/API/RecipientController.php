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

    public function insert(Request $request) {
        $recipient = new Recipient;
        $recipient->insertRecipient($request->toArray());
    }

    public function update(Request $request, $id) {
        $recipient = new Recipient;
        $recipient->updateRecipient($request->toArray(), $id);
    }
}
