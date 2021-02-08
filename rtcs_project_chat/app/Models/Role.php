<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    function group() {
        return $this->belongsToMany(Group::class);
    }

    function user() {
        return $this->belongsToMany(User::class);
    }

    function permission() {
        return $this->belongsToMany(Permission::class);
    }
}
