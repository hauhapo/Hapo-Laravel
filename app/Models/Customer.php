<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'image', 'email', 'phone', 'address'];

    public function scopeSearch($query, $request)
    {
    	return $query->searchName($request)
    		->searchEmail($request)
            ->searchPhone($request);
    }

    public function scopeSearchName($query, $request)
    {
        return $query->where('name', 'like', '%' . $request->keySearch . '%');
    }

    public function scopeSearchEmail($query, $request)
    {
        return $query->orWhere('email', 'like', '%' . $request->keySearch . '%');
    }

    public function scopeSearchPhone($query, $request)
    {
        return $query->orWhere('phone', 'like', '%' . $request->keySearch . '%');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
