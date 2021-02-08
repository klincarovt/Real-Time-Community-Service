<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    public function room(){
        $this->hasOne('App\Models\ChatRoom','id','chat_room_id');
    }
    public function user(){
        $this->hasOne('App\Models\User','id','user_id');
    }
}
