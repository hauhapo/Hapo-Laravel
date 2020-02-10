<?php

namespace App;namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name'];

    public function projects()
	{
		return $this->belongsTo(Project::class);
	}

	 public function projects()
	{
		return $this->belongsTo(Task::class);
	}
}
