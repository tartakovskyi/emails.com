<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignRecipients extends Model
{
    protected $fillable = ['camp_id', 'rec_id'];

    public static function getCampaignRecipients($id) {

    	return self::select('email', 'first_name', 'last_name')
    	->where('camp_id', $id)
        ->join('recipients', 'recipients.id', '=', 'campaign_recipients.rec_id')
    	->get()
    	->toArray();
    }

    public static function remove ($data, $id) {
    	self::where('camp_id', $id)->whereIn('rec_id', $data)->delete();
    }

}
