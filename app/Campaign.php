<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
	protected $fillable = ['camp_name', 'camp_status', 'autostart_at'];

	public function getCampaignInfo ($id) {
		return $this->leftJoin('campaign_statuses', 'campaigns.camp_status', '=', 'campaign_statuses.id')
		->select('campaigns.id', 'camp_name', 'autostart_at', 'started_at', 'complited_at', 'camp_status', 'status_name')
		->find($id)
		->toArray();
	}

	public function saveCampaign ($data, $id = null) {
		$recipient = $id ? self::find($id) : new Campaign;
		$recipient->fill($data);
		$recipient->save();
	}
}

