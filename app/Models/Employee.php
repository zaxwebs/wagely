<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = ['name', 'phone', 'group_id'];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

}
