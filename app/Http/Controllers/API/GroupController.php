<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
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
        $group = new Group;
        $group->saveGroup($request->toArray(), $id);
        $word = $id ? 'Changes' : 'Group'; 
        return response()->json(['status' => 'ok', 'text' => $word.' was successfully saved!']);
    }

    public function delete($id) {
        Group::destroy($id);
        return response()->json(['status' => 'ok', 'text' => 'Group was successfully deleted!']);
    }

}
