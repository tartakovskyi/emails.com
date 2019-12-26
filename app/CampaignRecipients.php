<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignRecipients extends Model
{
    protected $fillable = ['camp_id', 'rec_id'];

    public static function remove ($data, $id) {
    	self::where('camp_id', $id)->whereIn('rec_id', $data)->delete();
    }
}
