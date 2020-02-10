<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['name', 'description', 'start_time', 'end_time'];

	public function projects()
	{
		public function status()
		{
			return $this->hasOne(Status::class);
		}

		public function projects()
		{
			return $this->belongsTo(Project::class);
		}

		public function members()
		{
			return $this->belongsTo(Member::class);
		}
	}
}
