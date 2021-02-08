@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="card-header">
            <h3 class="text-left"> {{$groups->name}}</h3>
            <div class="card-header">
                <p class="text-left"> {{$groups->description}}</p>
            </div>
        </div>

        <div class="card-header">
            <form method="get" action="/groups/{{$groups->id}}/blogs/create">
                <button class="btn btn-outline-secondary btn-sm form-control" type="submit">Create Blog</button>
            </form>
        </div>
        <div class="card-header">
        </div>
        <br>


                <table class="table-borderless container">
                    <tr style="margin-right-right: 100%">
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    @foreach($blogs as $blog)
                        @if($blog!=null)

                            <tr class="card-header container">

                                <td class="font-weight-bold">
                                    {{$blog->name}}
                                </td>
                                <td>
                                    {{$blog->description}}
                                </td>

                                <td>
                                    <a class="btn btn-primary" href="/groups/{{$groups->id}}/blogs/{{$blog->id}}">View</a>
                                    <form method="get" action="/groups/{{$groups->id}}/blogs/{{$blog->id}}/edit">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </form>
                                    <form action="/groups/{{$groups->id}}/blogs/{{$blog->id}}"
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
@endsection
