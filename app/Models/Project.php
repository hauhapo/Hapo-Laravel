<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'status_id', 'leader', 'start_time', 'end_time', 'customer'];

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
        return $query->orWhere('status_id', 'like', '%' . $request->keySearch . '%');
    }

    public function scopeSearchPhone($query, $request)
    {
        return $query->orWhere('customer_id', 'like', '%' . $request->keySearch . '%');
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function customer()
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
