<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'image', 'email', 'phone', 'address'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
