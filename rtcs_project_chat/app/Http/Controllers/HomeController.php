<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Group;


class HomeController extends Controller
{
    public function index()
    {
        $groups=array();
        $user=Auth::user();
        $relations=DB::table('group_user')->get();

        $i=0;
        foreach ($relations as $relation){
            if(($relation->user_id) == $user->id){

                $gr_id=$relation->group_id;
                $groups[]=Group::find($gr_id);
                $i++;
            }
        }
        return view('home',[
            'groups'=>$groups
        ]);

    }
}
