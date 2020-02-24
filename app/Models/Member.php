<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Requests;

class Member extends Authenticatable
{
    const IS_ADMIN = [
        0 => 'User',
        1 => 'Admin'
    ];

    public function scopeSearch($query, $request)
    {
        return $query->searchName($request)
            ->searchEmail($request)
            ->searchPhone($request)
            ->searchRole($request);
    }

    public function scopeSearchName($query, $request)
    {
        return $query->where('name', 'like', '%' . $request->searchName . '%');
    }

    public function scopeSearchEmail($query, $request)
    {
        return $query->where('email', 'like', '%' . $request->searchEmail . '%');
    }

    public function scopeSearchPhone($query, $request)
    {
        return $query->where('phone', 'like', '%' . $request->searchPhone . '%');
    }

    public function scopeSearchRole($query, $request)
    {
        if (!empty($request->searchRole)) {
            return $query->where('is_admin', $request->searchRole);
        }
    }

    protected $fillable = ['name', 'image', 'email', 'phone', 'address', 'password', 'is_admin'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'member_project');
    }

    public function getIsAdminLabelAttribute()
    {
        return self::IS_ADMIN[$this->is_admin];
    }
}
