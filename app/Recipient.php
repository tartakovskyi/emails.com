<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
	public function getRecipients () {
		return $this->get()->toArray();
	}
    
}
