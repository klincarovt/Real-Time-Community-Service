@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="card-header">
            <h3 class="text-left"> {{$blog->name}}</h3>
            <div class="card-header">
                <p class="text-left"> {{$blog->description}}</p>

            </div>

        </div>
        <div class="card-header">
            <form method="get" action="/groups/{{$group_id}}/blogs/{{$blog->id}}/posts/create">
                <button class="btn btn-outline-secondary btn-sm form-control" type="submit">Create Post</button>
            </form>

            <a href="/groups/{{$group_id}}/blogs/{{$blog->id}}/posts/create">Create</a>
        </div>
        <br>


        <table class="table card-header">
                      <tr >
                          <th>Name</th>
                          <th>Description</th>
                          <th>Alter</th>
                          <th></th>
                      </tr>
            @foreach($posts as $post)

                      <tr style="margin-right: 10%">

                          <td>
                               {{$post->title}}
                          </td>
                          <td>
                              {{$post->content}}
                          </td>


                          <td>
                              <a class="btn btn-primary" href="/groups/{{$group_id}}/blogs/{{$blog->id}}/posts/{{$post->id}}">View</a>
                              <form method="get" action="/groups/{{$group_id}}/blogs/{{$blog->id}}/posts/{{$post->id}}/edit">
                                  @csrf
                                  <button class="btn btn-primary" type="submit">Edit</button>
                              </form>
                              <form action="/groups/{{$group_id}}/blogs/{{$blog->id}}/posts/{{$post->id}}"
                                    method="post">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                              </form>

                          </td>



                      </tr>


                  </table>

              @endforeach



    </div>
@endsection
