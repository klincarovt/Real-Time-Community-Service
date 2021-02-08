@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">
                <form method="post" action="/groups/{{$group_id}}/blogs/{{$blog_id}}/posts" >
                    @csrf
                    @method("post")
                    <div class="form-group">
                        <label>Post title</label><br>
                        <input type="text" id="name" name="name">

                    </div>
                    <div class="form-group">
                        <label>Content</label><br>
                        <textarea type="area" id="content" name="content"></textarea><br>
                    </div>
                    <button type="submit" class="btn-block btn btn-secondary">Create</button>
                </form>

            </div>
        </div>
    </div>


@endsection
