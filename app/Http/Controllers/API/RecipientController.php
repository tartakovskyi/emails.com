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
        return response()->json(['status' => 'ok', 'text' => 'Recipient was successfully added!']);

    }

    public function update(Request $request, $id) {
        $recipient = new Recipient;
        $recipient->updateRecipient($id, $request->toArray());
        return response()->json(['status' => 'ok', 'text' => 'Changes was successfully saved!']);
    }
}
