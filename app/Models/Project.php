<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = ['name', 'description', 'start_time', 'end_time'];

	public function members()
	{
		return $this->belongsToMany(Member::class);
	}

	public function customers()
	{
		return $this->belongsTo(Customer::class);
	}

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}

	public function status()
	{
		return $this->hasOne(Status::class);
	}
}
