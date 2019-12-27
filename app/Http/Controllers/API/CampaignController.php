<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CampaignRecipients;
use App\Campaign;

class CampaignController extends Controller
{

    public function save(Request $request, $id = null) {
        $group = new Campaign;
        $group->saveCampaign($request->toArray(), $id);
        /*$word = $id ? 'Changes' : 'Group'; 
        return response()->json(['status' => 'ok', 'text' => $word.' was successfully saved!']);*/
        if ($id) {
            $word = $id ? 'Changes' : 'Campaign'; 
        return response()->json(['status' => 'ok', 'text' => $word.' was successfully saved!']);
        } else {
            $id = Campaign::latest('created_at')->first()->id;
            return response()->json(['redirect' => $id]);
        }

    }

    public function delete($id) {
        Group::destroy($id);
        return response()->json(['status' => 'ok', 'text' => 'Campaign was successfully deleted!']);
    }

    public function addRecipients (Request $request) {
        $recipients = CampaignRecipients::insert($request->all());
    }


    public function removeRecipients (Request $request, $id) {
        $recipients = CampaignRecipients::remove($request->all(), $id);
    }
}
