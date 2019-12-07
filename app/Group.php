<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function getGroupList() {
    	return $this->get()->toArray();
    }
}
