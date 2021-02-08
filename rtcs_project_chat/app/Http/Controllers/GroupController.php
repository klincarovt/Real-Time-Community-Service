<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\Permission;

class GroupController extends Controller
{
    public function index(){
        $groups=Group::all();
        return view('groups.index',compact('groups',$groups));
    }
    public function join($id){
        $user=Auth::user();

        $data=DB::table('group_user')->where('group_id',$id)->where('user_id',$user->id)->get();
        $test=$data->all();

        $group=Group::findOrFail($id);
        if(empty($test)){

            $usr_id=$user->id;
            $gr_id=$group->id;

            $permissions=Permission::findOrFail(2);

            $per_id = $permissions->id;
            $data = array();
            $data['group_id'] = $gr_id;
            $data['user_id'] = $usr_id;
            $data['permission_id'] = $per_id;
            DB::table('roles')->insert($data);

            $group->users()->sync($user);

            return redirect('/home');
        }else{
            return redirect('/home');

        }


    }

    public function create(){
        return view('groups.create');
    }
    public function store(Request $request){

        $group=new Group();

        $group->name=$request->name;
        $group->description=$request->description;

        $group->save();

        $user=Auth::user();
        $group->users()->sync($user);

        $usr_id=$user->id;
        $gr_id=$group->id;
        $permissions=Permission::all();


        foreach ($permissions as $permission){
            $per_id=$permission->id;
            $data=array();
            $data['group_id']=$gr_id;
            $data['user_id']=$usr_id;
            $data['permission_id']=$per_id;

            DB::table('roles')->insert($data);
        }

        return redirect('/home');
    }

    public function edit($id){
        $group=Group::findOrFail($id);
        return view('groups.edit',compact(
            "group")
        );

    }
    public function update(Request $request, $id){
  /*     $groupUpdate=Group::find($group->id);
        $groupUpdate->name=$request->name;
        $groupUpdate->description=$request->description;
        $groupUpdate->save();*/

        Group::find($id)->update([
            'name' => $request['name'],
            'description' => $request['description'],

        ]);

        return redirect('/home');
    }

    public function destroy($id){
            DB::table('groups')->delete($id);
            return redirect('/home');
    }

    public function show($id)
    {
       $groups = Group::findOrFail($id);



        $data = DB::table('blogs')
            ->get()->where('group_id',$groups->id);

            $blogs = $data->all();




            return view('groups.show',[
                'groups'=>$groups,
               'blogs'=>$blogs
            ]);


    }
}
