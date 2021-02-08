<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Group;

class BlogController extends Controller
{
    public function index(){
        dd(Blog::all());
    }
    public function create($groups){
        return view('blogs.create',
            [
                'groups'=>$groups
            ]
        );
    }
    public function store($groups,Request $request){
        $blog=new Blog();

        $blog->name=$request->name;
        $blog->description=$request->description;
        $blog->group_id=$groups;
        $blog->save();

        return redirect('/groups/'.$groups);
    }
    public function show($group_id,$blog_id){

        $blog=Blog::findOrFail($blog_id);

       $data = DB::table('posts')->where('blog_id',$blog_id)->get();

        $posts=$data->all();


        return view('blogs.show',[
            'blog'=>$blog,
            'posts'=>$posts,
            'group_id'=>$group_id,
            'blog_id'=>$blog_id
        ]);

    }

    public function edit($group_id,$blog_id){
        $blog=Blog::findOrFail($blog_id);
        return view('blogs.edit',compact(
                "blog",'group_id')
        );

    }
    public function update($group_id,Request $request, $blog_id){


        Blog::find($blog_id)->update([
            'name' => $request['name'],
            'description' => $request['description'],

        ]);

        return redirect('/groups/'.$group_id);
    }

    public function destroy($groups,$blog_id){
        DB::table('blogs')->delete($blog_id);
        return redirect('/groups/'.$groups);
    }
}
