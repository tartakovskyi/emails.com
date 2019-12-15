<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public static function getGroupList ($fields = null) {
    	$query = $fields ? self::select($fields)->get() : self::all();
    	return $query->toArray();
    }
}
