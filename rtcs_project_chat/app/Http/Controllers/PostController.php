<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Post;

class PostController extends Controller
{
    public function create($group_id,$blog_ig){
        return view('posts.create',
            [
                'group_id'=>$group_id,
                'blog_id'=>$blog_ig
            ]
        );
    }
    public function store($group_id,$blog_id,Request $request){
        $post=new Post();

        $post->title=$request->title;
        #changed cause error content to title
        $post->content=$request->title;
        $post->blog_id=$blog_id;
        $post->user_id=Auth::id();
        $post->edited=0;
        $post->save();

        return redirect('/groups/'.$group_id.'/blogs/'.$blog_id);
    }

    public function edit($group_id,$blog_id,$post_id){
        $post=Post::findOrFail($post_id);
        return view('posts.edit',compact(
                "blog_id",'group_id','post')
        );

    }
    public function update($group_id,$blog_id,Request $request,$post_id){

        Post::find($post_id)->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'edited'=>1

        ]);

        return redirect('/groups/'.$group_id.'/blogs/'.$blog_id);
    }

    public function show($group_id,$blog_id,$post_id){

        $post=Post::findOrFail($post_id);

        $data = DB::table('comments')->where('post_id',$post_id)->get();

        $comments=$data->all();


        return view('posts.show',[
            'post_id'=>$post_id,
            'post'=>$post,
            'comments'=>$comments,
            'group_id'=>$group_id,
            'blog_id'=>$blog_id
        ]);

    }

    public function destroy($groups,$blog_id,$post_id){
        DB::table('posts')->delete($post_id);
        return redirect('/groups/'.$groups.'/blogs/'.$blog_id);
    }
}
