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

    public function create (Request $request) {;
       dd($request->get('data'));
   }

   public function update(Request $request, $id) {
        $recipient = new Recipient($id);
        $test = $recipient->updateRecipient($request->toArray());
        /*$test = $request->toArray();*/
        var_dump($test);

    }
}
