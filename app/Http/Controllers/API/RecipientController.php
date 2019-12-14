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

    public function save(Request $request, $id = null) {
        $recipient = new Recipient;
        $recipient->saveRecipient($request->toArray(), $id);
        $word = $id ? 'Changes' : 'Recipient'; 
        return response()->json(['status' => 'ok', 'text' => $word.' was successfully saved!']);
    }

    public function delete($id) {
        Recipient::destroy($id);
        return response()->json(['status' => 'ok', 'text' => 'Recipient was successfully deleted!']);
    }

    public function filter(Request $request) {
        $recipients = new Recipient;
        $recArr = $recipients->getRecipients($request->toArray());

        return view('recipients_table', ['recArr' => $recArr]);
    }
}
