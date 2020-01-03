<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
	public static function run ($id) 
	{
		$campaign = Campaign::find($id)->toArray();

		dd($campaign);

		/*Mail::send([], [], function ($m)  {

			$m->from('hello@app.com', 'Laravel');

			$m->to('vvt2001@ukr.net', 'Volodymyr')->subject('Your Reminder!')->setBody($campaign['camp_letter']);;
		});

		echo 'success';
*/
	}
}
