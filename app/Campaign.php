<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Mail;
use File;
use Carbon\Carbon;
use App\CampaignStatus;
use App\CampaignRecipients;


class Campaign extends Model
{
	protected $fillable = ['camp_name', 'camp_status', 'camp_letter', 'autostart_at'];


	public function campaignStatus()
	{

		return $this->hasOne('App\CampaignStatus','id', 'camp_status');
	}


	public static function getCampaignList($data)
	{

		return self::whereIn('camp_status', $data['status_id'])->with('campaignStatus')->get();

	}


	public function getCampaignInfo($id)
	{

		return $this->with('campaignStatus')->find($id);
	}


	public function saveCampaign($data, $id = null)
	{
		
		$recipient = $id ? self::find($id) : new Campaign();
		$recipient->fill($data);
		$recipient->save();
	}

	public static function makeTemplatesList()
	{

		$files = File::allFiles(resource_path('views/emails'));
		$views = [];

		foreach ($files as $file) {
			$fileName = pathinfo($file)['filename'];
			$viewName = str_replace('.blade','',$fileName);
			$views[] = $viewName;
		}

		return $views;
	}


	protected function send($campaignInfo, $recipients)
	{

		foreach ($recipients as $recipient) {

			$view = 'emails.' . $campaignInfo->camp_letter;

			Mail::send($view, $recipient, function ($m) use ($campaignInfo, $recipient)  {

				$m->from('no-reply@emails.loc', 'Email Sending Service');

				$m->to($recipient['email'], $recipient['first_name'] . ' ' . $recipient['last_name'])->subject($campaignInfo->camp_name);
			});
		}
	}


	public static function runCampaign($id)
	{

		$recipients = CampaignRecipients::getCampaignRecipients($id);

		$campaign = self::find($id);

		$campaignInfo = $campaign->getCampaignInfo($id);

		$campaign->started_at = Carbon::now();

		$campaign->camp_status = 2;

		$campaign->save();

		$campaign->send($campaignInfo, $recipients);

		$campaign->completed_at = Carbon::now();

		$campaign->camp_status = 3;

		$campaign->save();

		return $campaignInfo;
	}
}