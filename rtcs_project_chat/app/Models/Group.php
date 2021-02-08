<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function users(){
        return $this->belongsToMany(\App\Models\User::class);
    }
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
    public function roles(){
        return $this->hasMany(Role::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
