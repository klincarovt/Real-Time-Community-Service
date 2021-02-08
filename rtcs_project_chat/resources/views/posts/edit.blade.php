@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">
                <form action="/groups/{{$group_id}}/blogs/{{$blog_id}}/posts/{{$post->id}}" method="post">
                    @csrf
                    @method("PATCH")
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <div class="form-group">
                        <label>Post title</label><br>
                        <input type="text" id="title" name="title"  value="{{$post->title}}">

                    </div>
                    <div class="form-group">
                        <label>content</label><br>
                        <textarea type="area" id="content" name="content" >{{$post->content}}</textarea><br>
                    </div>
                    <button type="submit" class="btn-block btn btn-secondary">Edit</button>
                </form>

            </div>
        </div>
    </div>


@endsection
