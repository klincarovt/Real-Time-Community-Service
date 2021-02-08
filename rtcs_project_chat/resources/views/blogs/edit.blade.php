@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">
                <form action="/groups/{{$group_id}}/blogs/{{$blog->id}}" method="post">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="id" value="{{$blog->id}}">
                    <div class="form-group">
                        <label>Blog name</label><br>
                        <input type="text" id="name" name="name"  value="{{$blog->name}}">

                    </div>
                    <div class="form-group">
                        <label>Description</label><br>
                        <textarea type="area" id="description" name="description" >{{$blog->description}}</textarea><br>
                    </div>
                    <button type="submit" class="btn-block btn btn-secondary">Edit</button>
                </form>

            </div>
        </div>
    </div>


@endsection
