@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-left">
                            {{ __('Groups Dashboard') }}
                            <h2<a class="btn btn-primary" href="/groups">Join Group</a></div>
                        </div>
                        <div class="text-right">
                            <form method="get" action="/groups/create">
                                <button class="btn btn-outline-secondary btn-sm form-control" type="submit">Create Group</button>
                            </form>
                        </div>
                    </div>
                    <div class="container card-header" align="center">
                        <h4 align="center">Your groups</h4>
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th></th>
                            </tr>
                            <h1 class="form-controll"></h1>

                           @foreach($groups as $group)
                               @if($group!=null)

                               <tr class="card-header container">
                                   <td class="font-weight-bold">
                                       {{$group->name}}
                                   </td>
                                   <td>
                                       {{$group->description}}
                                   </td>
                                   <td>
                                       {{$group->created_at}}
                                   </td>
                                   <td>
                                       <a class="btn btn-primary" href="/groups/{{$group->id}}">View</a>
                                       <form method="get" action="/groups/{{$group->id}}/edit">
                                           @csrf
                                           <button class="btn btn-primary" type="submit">Edit</button>
                                       </form>
                                       <form action="/groups/{{$group->id}}"
                                             method="post">
                                           @method('DELETE')
                                           @csrf
                                           <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                       </form>

                                   </td>
                               </tr>
                                @endif
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
