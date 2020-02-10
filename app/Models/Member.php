<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'image', 'email', 'phone', 'address', 'password', 'account'];

    public function tasks()
	{
		return $this->hasMany(Task::class);
	}

	public function projects()
	{
		return $this->hasMany(Project::class, 'member_project');
	}

	public function member_project()
	{
		return $this->belongsTo(MemberProject::class);
	}
}
