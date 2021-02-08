<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
{
    public function store($group_id,$blog_id,$post_id,Request $request){
        $comment=new Comment();

        $comment->content=$request->content;
        $comment->post_id=$post_id;
        $comment->user_id=Auth::id();

        $comment->save();

        return redirect('/groups/'.$group_id.'/blogs/'.$blog_id.'/posts/'.$post_id);
    }


    public function destroy($groups,$blog_id,$post_id,$comment_id){
        DB::table('comments')->delete($comment_id);
        return redirect('/groups/'.$groups.'/blogs/'.$blog_id.'/posts/'.$post_id);
    }
}
