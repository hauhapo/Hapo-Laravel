<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class MemberProject extends Model
{
    public function members()
    {
    	return $this->hasMany(Member::class);
    }

    public function projects()
    {
    	return $this->hasMany(Project::class);
    }
}
