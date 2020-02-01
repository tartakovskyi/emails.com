<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function save(Request $request, $id = null) {

        User::find($id)->update($request->toArray());
        return response()->json(['status' => 'ok', 'text' => 'User was successfully saved!']);
    }

    public function delete($id) {

        User::destroy($id);
        return response()->json(['status' => 'ok', 'text' => 'User was successfully deleted!']);
    }
}
