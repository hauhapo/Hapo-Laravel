<?php

namespace App;namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'statuses';

    protected $fillable = ['name'];

    public function projects()
	{
		return $this->hasMany(Project::class);
	}

	 public function tasks()
	{
		return $this->hasMany(Task::class);
	}
}
