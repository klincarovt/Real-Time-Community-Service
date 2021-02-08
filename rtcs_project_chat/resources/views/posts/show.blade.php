@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="container card-header">

            <h3 class="text-left"> {{$post->title}}</h3>
            <div class="card-header">
                <p class="text-left"> {{$post->content}}</p>

            </div>


        </div>
        <br>


        <table class="table">
                      <tr style="margin-right-right: 100%">
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
            @foreach($comments as $comment)

                      <tr style="margin-right: 10%" class="card-header">

                          <td>
                               {{\App\Models\User::findOrFail($comment->user_id)->name}}
                          </td>
                          <td>
                              {{$comment->content}}
                          </td>

                          <td>

                              <form action="/groups/{{$group_id}}/blogs/{{$blog_id}}/posts/{{$post->id}}/comments/{{$comment->id}}"
                                    method="post">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                              </form>

                          </td>

                      </tr>
            @endforeach


        </table>

        <div class="card-header">

            <form method="post" action="/groups/{{$group_id}}/blogs/{{$blog_id}}/posts/{{$post->id}}/comments">
                <h4>Add a comment</h4>
                @csrf
                <input type="hidden" value="{{$post_id}}">
                <input type="text" name="content" class="form-control row justify-content-center"><br>
                <input type="submit" class="btn btn-info form-control" value="Submit">
            </form>
        </div>

    </div>
@endsection
