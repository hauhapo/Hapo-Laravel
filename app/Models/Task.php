<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['name', 'description', 'start_time', 'end_time'];

		public function status()
		{
			return $this->hasOne(Status::class);
		}

		public function project()
		{
			return $this->belongsTo(Project::class);
		}

		public function member()
		{
			return $this->belongsTo(Member::class);
		}
}
